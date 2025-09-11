<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\UserNewsLike;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function comments()
    {
        $comments = Comment::query()
            ->where('user_id', auth('web')->id())
            ->with(['news.newsCategory','news.admin'])
            ->paginate(5)
            ->withQueryString();

        return view('account.comments', compact('comments'));
    }
}
