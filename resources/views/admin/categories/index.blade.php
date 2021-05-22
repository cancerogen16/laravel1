@extends('layouts.admin')

@section('title')Список рубрик новостей - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список рубрик новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-primary" href="/admin/categories/create" role="button">Добавить рубрику</a>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Название</th>
                <th>Ярлык</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category['category_id'] }}</td>
                    <td><a href="/admin/categories/{{ $category['category_id'] }}/edit">{{ $category['title'] }}</a></td>
                    <td>{{ $category['slug'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


