<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    /**
     * Show success message
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('common.success');
    }
}
