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
            <div class="row g-3 col-lg-6 col-md-8 mx-auto">
                @include('common.result')
            </div>

            <form class="row g-3 col-lg-6 col-md-8 mx-auto" method="post" action="{{ route('feedback.save') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение">{{ old('message') }}</textarea>
                    @error('message')
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
