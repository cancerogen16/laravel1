@extends('layouts.app')

@section('title', "Новости из рубрики" )

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>{{ $title }}</h1> </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($category_news)
                        @foreach($category_news as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="/news/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td>Нет новостей в категории</td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


