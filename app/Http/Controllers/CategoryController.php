<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
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
        $categoryModel = new Category();

        $categories = $categoryModel->getCategoriesList();

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Новости из категории';

        $categoryModel = new Category();

        $category_news = $categoryModel->getCategoryNews($id);

        $category = Category::find($id);

        if ($category !== null) {
            $title = 'Новости из категории ' . $category->title;
        }

        return view('categories.show', compact('title', 'category_news', 'id'));
    }
}
