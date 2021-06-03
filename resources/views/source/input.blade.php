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
            @if ($errors->any())
                <div class="row g-3 col-lg-6 col-md-8 mx-auto">
                    <div class="col-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="row g-3 col-lg-6 col-md-8 mx-auto">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

            <form class="row g-3 col-lg-6 col-md-8 mx-auto" method="post" action="{{ route('source.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Номер телефона</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email-адрес</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email-адрес" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="info">Информация</label>
                    <textarea name="info" class="form-control" id="info" cols="30" rows="10" placeholder="Информация">{{ old('info') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
