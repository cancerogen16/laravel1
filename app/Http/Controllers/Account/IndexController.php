<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = \Auth::user();

        return view('account.index', [
            'user' => $user,
            'adminLink' => route('admin.index'),
            'logoutLink' => route('account.logout'),
        ]);
    }
}
