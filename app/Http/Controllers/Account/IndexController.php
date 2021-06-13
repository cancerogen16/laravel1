<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): string
    {
        return 'Welcome, ' . \Auth::user()->name . '<br>
            <a href="' . route('admin.index') . '">В админку</a><br>
            <a href="' . route('account.logout') . '">Выход</a>';

    }
}
