@extends('layouts.app')

@section('title', 'Сообщение отправлено')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Операция выполнена успешно</h1>
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
                <div class="row g-3 col-lg-6 col-md-8 mx-auto">
                    <div class="col-12">
                        <a class="nav-link" href="/">На главную страницу</a>
                    </div>
                </div>
        </div>
    </div>
@endsection
