@extends('layouts.admin')

@section('title')Список категорий новостей - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">Добавить категорию</a>
            </div>
        </div>
    </div>
    @include('common.result')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Ред.</a>
                            <a class="btn btn-danger deleteRecord" href="{{ route('categories.destroy', $category->id) }}" data-id="{{ $category->id }}">Удал.</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Записей нет</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>{{ $categories->links() }}</div>
    </div>
@endsection


