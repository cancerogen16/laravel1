@extends('layouts.app')

@section('title', 'Заказ выгрузки данных')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Заказ выгрузки данных</h1>
            </div>
        </div>
    </section>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row g-3 col-lg-6 col-md-8 mx-auto">
                @include('common.result')
            </div>
            <form class="row g-3 col-lg-6 col-md-8 mx-auto" method="post" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Номер телефона *</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email-адрес *</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email-адрес" value="{{ old('email') }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="info">Информация *</label>
                    <textarea name="info" class="form-control" id="info" cols="30" rows="10" placeholder="Информация">{{ old('info') }}</textarea>
                    @error('info')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
