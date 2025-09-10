<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikedNewsController extends Controller
{
    //
    public function likedNews()
    {
        return view('account.liked-news');
    }
}
