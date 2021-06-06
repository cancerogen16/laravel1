@extends('layouts.app')

@section('title', 'Форма обратной связи')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Форма обратной связи</h1>
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

            <form class="row g-3 col-lg-6 col-md-8 mx-auto" method="post" action="{{ route('feedback.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение">{{ old('message') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
