<?php

namespace App\Http\Controllers;

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
        $categories = $this->categories;

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
        $news = $this->news;
        $categories = $this->categories;
        $category_posts = [];
        
        foreach ($news as $post) {
            if (!empty($post['category_id'])) {
                if ($post['category_id'] == $id) {
                    $category_posts[] = $post;
                }
            }
        }

        $title = 'Новости из рубрики #' . $id; 

        return view('categories.show', compact('category_posts', 'id'));
    }
}
