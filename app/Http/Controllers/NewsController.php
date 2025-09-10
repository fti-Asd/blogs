<?php

namespace App\Http\Controllers;

use App\Enums\CommentStatus;
use App\Http\Requests\NewsIndexRequest;
use App\Http\Requests\NewsLikeRequest;
use App\Http\Requests\NewsPostCommentRequest;
use App\Http\Requests\NewsPostReplyCommentRequest;
use App\Models\Comment;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\UserNewsLike;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    //
    public function index(NewsIndexRequest $request)
    {
        $newsCategories = NewsCategory::get();

        $categoryName = NewsCategory::query()
            ->when($request->has('category_id'), function (Builder $query) use ($request) {
                $query->where('id', $request->query('category_id'));
            })
            ->first();

        $newsItems = News::query()
            ->filterByCategoryId()
            ->applySearch()
            ->applySort()
            ->paginate()
            ->withQueryString();

        return view('news.index', compact('newsCategories', 'newsItems', 'categoryName'));
    }

    public function show(string $newsId)
    {
        $news = News::findOrFail($newsId);

        $comments = Comment::query()
            ->where('news_id', $news->id)
            ->where('status', CommentStatus::ACCEPTED)
            ->whereNull('comment_id')
            ->getReplyCommentData()
            ->get();

        $isUserLikeNews = UserNewsLike::query()
            ->where('user_id', Auth::guard('web')?->user()?->id)
            ->where('news_id', $newsId)
            ->exists();

        return view('news.show', compact('news', 'comments', 'isUserLikeNews'));
    }

    public function postComment(NewsPostCommentRequest $request, string $newsId)
    {
        News::findOrFail($newsId);
        $inputs = $request->validated();

        try {
            Comment::create([
                'comment_text' => $inputs['comment_text'],
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'user_id' => $inputs['user_id'],
                'admin_id' => $inputs['admin_id'],
                'news_id' => $newsId,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return backWithError("خطایی رخ داد، مجدد تلاش کنید");
        }

        return redirect()->route('news.show', $newsId);
    }

    public function postReplyComment(NewsPostReplyCommentRequest $request, string $newsId, string $commentId)
    {
        News::findOrFail($newsId);
        Comment::findOrFail($commentId);

        $inputs = $request->validated();

        try {
            Comment::create([
                'comment_text' => $inputs['comment_text'],
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'user_id' => $inputs['user_id'],
                'admin_id' => $inputs['admin_id'],
                'news_id' => $newsId,
                'comment_id' => $commentId,
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return backWithError("خطایی رخ داد، مجدد تلاش کنید");
        }

        return redirect()->route('news.show', $newsId);
    }

    public function like(NewsLikeRequest $request)
    {
        $UserLikedNews = UserNewsLike::query()
            ->where('user_id', Auth::guard('web')->user()->id)
            ->where('news_id', $request->input('news_id'))
            ->first();

        if (!empty($UserLikedNews)) {
            $UserLikedNews->delete();

            $news = News::findOrFail($request->input('news_id'));
            $news->decrement('like_qty', 1);
            $news->save();

        } else {
            try {
                UserNewsLike::create([
                    "user_id" => $request->input('user_id'),
                    "news_id" => $request->input('news_id'),
                ]);

                $news = News::findOrFail($request->input('news_id'));
                $news->increment('like_qty', 1);
                $news->save();

            } catch (Exception $exception) {
                Log::error($exception);
                return backWithError("خطایی رخ داد، مجدد تلاش کنید");
            }
        }

        return redirect()->route('news.show', $request->input('news_id'));
    }
}
