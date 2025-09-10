<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\UserNewsLike;
use Illuminate\Http\Request;

class LikedNewsController extends Controller
{
    //
    public function likedNews()
    {
        $likedNewsItems = UserNewsLike::query()
            ->where('user_id', auth('web')->id())
            ->with(['news.newsCategory', 'news.admin'])
            ->paginate(3)
            ->withQueryString();

        return view('account.liked-news', compact('likedNewsItems'));
    }

    public function update(string $id)
    {
        $likedNews = UserNewsLike::query()
            ->where('id', $id)
            ->withTrashed()
            ->first();

        if($likedNews->deleted_at == null){
            $likedNews->delete();
        }else{
            $likedNews->restore();
        }

        return redirect()->route('account.liked-news');
    }
}
