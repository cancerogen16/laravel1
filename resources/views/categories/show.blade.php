@extends('layouts.app')

@section('title', "Новости из рубрики" )

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>{{ $title }}</h1> </div>

                <div class="card-body">
                    <table class="table table-striped table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($category_news as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="/news/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><h3>Записей нет</h3></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('categories') }}">К списку категорий</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


