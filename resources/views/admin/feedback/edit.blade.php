@extends('layouts.admin')

@section('title')Редактировать сообщение - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать сообщение</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('feedback.update', $message->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ $message->name }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Сообщение">{{ $message->message }}</textarea>
                    @error('message')
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


