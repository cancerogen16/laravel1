@extends('layouts.admin')

@section('title')Панель администратора@stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Панель администратора</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-primary" href="/admin/news/create" role="button">Добавить новость</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Название</th>
                <th>ID рубрики</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post['id'] }}</td>
                    <td><a href="/admin/news/{{ $post['id'] }}/edit">{{ $post['title'] }}</a></td>
                    <td>
                        @if ($post['category_id'])
                            <a href="/admin/categories/{{ $post['category_id'] }}/edit">{{ $post['category_name'] }}</a>
                        @else
                            Нет рубрики
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


