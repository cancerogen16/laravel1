@extends('layouts.admin')

@section('title')Профили пользователей - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Профили пользователей</h1>
    </div>
    @include('common.result')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Админ</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                            Да
                        @else
                            Нет
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Ред.</a>
                            <a class="btn btn-danger deleteRecord" href="{{ route('users.destroy', $user->id) }}" data-id="{{ $user->id }}">Удал.</a>
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
        <div>{{ $users->links() }}</div>
    </div>
@endsection


