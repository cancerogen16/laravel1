@extends('layouts.admin')

@section('title')Редактировать заказ - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать заказ</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-2">
            <form class="row g-3" method="post" action="{{ route('orders.update', $order->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ $order->name }}">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Номер телефона *</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ $order->phone }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email-адрес *</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email-адрес" value="{{ $order->email }}">
                </div>
                <div class="form-group">
                    <label for="info">Информация *</label>
                    <textarea name="info" class="form-control" id="info" cols="30" rows="10" placeholder="Информация">{{ $order->info }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


