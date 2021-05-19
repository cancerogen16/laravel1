@extends('layouts.app')

@section('title', 'Редактирование новости')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Редактирование новости</h1></div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="form-label">Заголовок</label>
                            <input type="text" class="form-control" id="name" placeholder="Заголовок" value="{{ $current_post['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select class="form-control" id="category_id" name="category_id">
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
                            <label for="excerpt">Отрывок</label>
                            <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="4" placeholder="Отрывок">{{ $current_post['excerpt'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="text">Текст новости</label>
                            <textarea name="text" class="form-control" id="text" cols="30" rows="10" placeholder="Текст новости">{{ $current_post['content_html'] }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


