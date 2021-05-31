@extends('layouts.app')

@section('title', "Новости из рубрики" )

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Вывод новостей из рубрики #{{ $id }}</h1> </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category_posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td><a href="/news/{{ $post['id'] }}">{{ $post['title'] }}</a></td>
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


