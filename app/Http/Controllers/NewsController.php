<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('news.index', [
            'newsList' => News::where(['status' => 'published'])
                ->orderByDesc('created_at')
                ->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}
