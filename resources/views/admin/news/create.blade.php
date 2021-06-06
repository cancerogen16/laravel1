@extends('layouts.admin')

@section('title')Добавить новость - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif

        <div class="mb-2">
            <form class="row g-3" method="post" action="{{ route('news.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Заголовок *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Ярлык</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Ярлык" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Логотип</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория *</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="excerpt">Отрывок</label>
                    <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="3" placeholder="Отрывок">{{ old('excerpt') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Описание *</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Описание">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status" name="status">
                        @foreach($statuses as $status)
                            <option value="{{ $status->slug }}">{{ $status->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


