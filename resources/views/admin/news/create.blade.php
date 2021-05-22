@extends('layouts.admin')

@section('title')Создание новости - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Создание новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="row g-3">
                <div class="form-group">
                    <label for="name" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="name" placeholder="Заголовок">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category['category_id'] }}">{{ $category['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Текст новости</label>
                    <textarea name="text" class="form-control" id="text" cols="30" rows="10" placeholder="Текст новости"></textarea>
                </div>
            </form>
        </div>
    </div>
@endsection


