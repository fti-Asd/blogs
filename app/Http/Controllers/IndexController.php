<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $newsCategories = NewsCategory::get();
        $newsItems = News::query()
            ->with('newsCategory')
            ->orderByDesc('created_at')
            ->limit(9)
            ->get();

        return view('index', compact('newsCategories', 'newsItems'));
    }
}
