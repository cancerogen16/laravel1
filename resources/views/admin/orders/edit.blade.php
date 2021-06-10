@extends('layouts.admin')

@section('title')Редактировать заказ - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать заказ</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('orders.update', $order->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ $order->name }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Номер телефона *</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ $order->phone }}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email-адрес *</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email-адрес" value="{{ $order->email }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="info">Информация *</label>
                    <textarea name="info" class="form-control" id="info" cols="30" rows="10" placeholder="Информация">{{ $order->info }}</textarea>
                    @error('info')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


