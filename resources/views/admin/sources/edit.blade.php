@extends('layouts.admin')

@section('title')Редактировать источник - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('sources.update', $source->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="url" class="form-label">URL *</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ $source->url }}">
                    @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Описание">{{ $source->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection


