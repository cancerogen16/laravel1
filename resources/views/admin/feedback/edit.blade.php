@extends('layouts.admin')

@section('title')Редактировать сообщение - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать сообщение</h1>

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
            <form class="row g-3" method="post" action="{{ route('feedback.update', $message->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ $message->name }}">
                </div>
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение">{{ $message->message }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


