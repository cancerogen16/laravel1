@extends('layouts.admin')

@section('title')Редактирование новости - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование новости</h1>
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
                    <input type="text" class="form-control" id="name" placeholder="Заголовок" value="{{ $current_post['title'] }}">
                </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category['category_id'] }}"
                                    @if ($category['category_id'] == $current_post['category_id'])
                                    selected="selected"
                                @endif
                            >{{ $category['title'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="excerpt" class="form-label">Отрывок</label>
                    <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="4" placeholder="Отрывок">{{ $current_post['excerpt'] }}</textarea>
                </div>
                <div class="form-group">
                    <label for="text" class="form-label">Текст новости</label>
                    <textarea name="text" class="form-control" id="text" cols="30" rows="10" placeholder="Текст новости">{{ $current_post['content_html'] }}</textarea>
                </div>
            </form>
        </div>
    </div>
@endsection


