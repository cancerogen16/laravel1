@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Вывод списка новостей</h1> </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Рубрика</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td><a href="/news/{{ $post['id'] }}">{{ $post['title'] }}</a></td>
                                <td>
                                @if ($post['category_id'])
                                <a href="news/category/{{ $post['category_id'] }}">{{ $post['category_name'] }}</a>
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
        </div>
    </div>
</div>
@endsection