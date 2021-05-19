@extends('layouts.app')

@section('title', 'Редактирование новостей')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Редактирование новостей</h1></div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>ID рубрики</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $post)
                            <tr>
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
            </div>

            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="/admin/news/create" role="button">Добавить новость</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


