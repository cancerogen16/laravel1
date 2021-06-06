<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends BaseController
{
    public function index()
    {
        return view('news.index', [
            'newsList' => News::where(['status' => 'published'])
                ->orderByDesc('created_at')
                ->get()
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}
