<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = [
            ['id' => 1, 'title' => 'NewsCategory 1'],
            ['id' => 2, 'title' => 'NewsCategory 2'],
            ['id' => 3, 'title' => 'NewsCategory 3'],
        ];

        return view('news.category.index', compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
