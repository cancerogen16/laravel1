<?php

namespace App\Http\Controllers;

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
        $news = $this->news;
        $categories = $this->categories;
        
        foreach ($news as &$post) {
            if (!empty($post['category_id'])) {
                foreach ($categories as $category) {
                    if ($post['category_id'] == $category['category_id']) {
                        $post['category_name'] = $category['title'];
                    }
                }
            }
        }

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
        $news = $this->news;
        $current_post = [];
        
        foreach ($news as $post) {
            if ($post['id'] == $id) {
                $current_post = $post;
            }
        }

        return view('news.show', compact('current_post'));
    }
}
