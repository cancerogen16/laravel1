<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:55',
            'phone' => 'required|max:20',
            'email' => 'required|email:rfc,dns',
            'info' => 'required|max:255',
        ]);

        $data = $request->only(['name', 'phone', 'email', 'info']);

        $order = new Order($data);

        $order->save();

        return redirect()
            ->route('success')
            ->with(['success' => 'Выгрузка данных успешно заказана!']);
    }
}
