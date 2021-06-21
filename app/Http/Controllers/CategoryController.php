<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $category_news = News::where('category_id', '=', $id)
            ->where('status', '=', 'published')
            ->get();

        $title = 'Новости из категории ';

        $category = Category::find($id);

        if ($category !== null) {
            $title = 'Новости из категории ' . $category->title;
        }

        return view('categories.show', compact('title', 'category_news', 'id'));
    }
}
