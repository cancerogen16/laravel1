<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;

class MainController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.index');
    }
}
