@extends('layouts.admin')

@section('title')Редактировать категорию - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="mb-2">
            <form class="row g-3" method="post" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ $current_category['title'] }}">
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Ярлык</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Ярлык" value="{{ $current_category['slug'] }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Описание">{{ $current_category['description'] }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection




