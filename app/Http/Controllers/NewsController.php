<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsModel = new News();

        $news = $newsModel->newsList();

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsModel = new News();

        $current_post = $newsModel->newsOne($id);

        return view('news.show', compact('current_post'));
    }
}
