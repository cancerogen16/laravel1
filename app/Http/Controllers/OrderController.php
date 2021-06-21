<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @param OrderRequest $request
     * @return RedirectResponse
     */
    public function store(OrderRequest $request): RedirectResponse
    {
        $data = $request->only(['name', 'phone', 'email', 'info']);

        $order = new Order($data);

        $order->save();

        return redirect()
            ->route('success')
            ->with(['success' => 'Выгрузка данных успешно заказана!']);
    }
}
