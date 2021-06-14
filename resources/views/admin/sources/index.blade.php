@extends('layouts.admin')

@section('title')Источники новостей - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Источники новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-primary" href="{{ route('sources.create') }}" role="button">Добавить источник</a>
            </div>
        </div>
    </div>
    @include('common.result')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>URL</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->url }}</td>
                    <td>{{ $source->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" href="{{ route('sources.edit', $source->id) }}">Ред.</a>
                            <a class="btn btn-danger deleteRecord" href="{{ route('sources.destroy', $source->id) }}" data-id="{{ $source->id }}">Удал.</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Источников нет</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>{{ $sources->links() }}</div>
    </div>
@endsection


