@extends('layouts.admin')

@section('title')Список новостей - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-primary" href="{{ route('news.create') }}" role="button">Добавить новость</a>
            </div>
        </div>
    </div>
    @include('common.result')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <form action="{{ route('news.destroy',$news->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="{{ route('news.edit', ['news' => $news]) }}">Ред.</a>
                                <button type="submit" class="btn btn-danger">Удал.</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Записей нет</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>{{ $newsList->links() }}</div>
    </div>
@endsection


