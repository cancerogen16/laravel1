@extends('layouts.admin')

@section('title')Заказы на выгрузку - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказы на выгрузку данных</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td><a href="{{ route('orders.edit', ['order' => $order]) }}">Ред.</a>&nbsp;||&nbsp;
                        <a href="javascript:;" class="delete">Уд.</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Заказов нет</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>{{ $orders->links() }}</div>
    </div>
@endsection


