@extends('layouts.admin')

@section('title')Добавить категорию - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Заголовок *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Ярлык</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Ярлык" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание *</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Описание">{{ old('description') }}</textarea>
                    @error('description')
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




