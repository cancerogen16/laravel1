@extends('layouts.admin')

@section('title')Редактировать новость - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('news.update', $newsInfo->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Заголовок *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" value="{{ $newsInfo->title }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Ярлык</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Ярлык" value="{{ $newsInfo->slug }}">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Логотип</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория *</label>
                    <select class="form-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if ($category->id == $newsInfo->category_id)
                                    selected="selected"
                                @endif
                            >{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="excerpt">Отрывок</label>
                    <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="3" placeholder="Отрывок">{{ $newsInfo->excerpt }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Описание *</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Описание">{{ $newsInfo->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status" name="status">
                        @foreach($statuses as $status)
                            <option value="{{ $status->slug }}"
                                    @if ($status->slug == $newsInfo->status)
                                    selected="selected"
                                @endif
                            >{{ $status->title }}</option>
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


