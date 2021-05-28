<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class NewsController extends AdminBaseController
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

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;

        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);

        $fields = $request->all();
        dd($fields);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->news;
        $categories = $this->categories;
        $current_post = [];

        foreach ($news as &$post) {
            if (!empty($post['category_id'])) {
                foreach ($categories as $category) {
                    if ($post['category_id'] == $category['category_id']) {
                        $post['category_name'] = $category['title'];
                    }
                }
            }

            if ($post['id'] == $id) {
                $current_post = $post;

                break;
            }
        }

        return view('admin.news.edit', compact('categories', 'id', 'current_post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
