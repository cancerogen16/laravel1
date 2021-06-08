<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $order = new Order();

        return view('admin.orders.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return RedirectResponse
     */
    public function store(OrderRequest $request): RedirectResponse
    {
        $data = $request->input();

        $order = new Order($data);

        $order->save();

        return redirect()
            ->route('orders.edit', [$order->id])
            ->with(['success' => 'Успешно сохранено!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(OrderRequest $request, int $id): RedirectResponse
    {
        $order = Order::find($id);

        if (empty($order)) {
            return back()
                ->withErrors(['msg' => "Заказ id=[{$id}] не найден"])
                ->withInput();
        }

        $data = $request->input();

        $result = $order->update($data);

        if ($result) {
            return redirect()
                ->route('orders.edit', $order->id)
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()
            ->route('orders.index')
            ->with(['success' => 'Успешно удалено!']);
    }
}
