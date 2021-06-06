@extends('layouts.admin')

@section('title')Сообщения - @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Сообщения с формы обратной связи</h1>
    </div>
    @include('common.result')
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Сообщение</th>
                <th>Прочитано</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->readed }}</td>
                    <td>
                        <form action="{{ route('feedback.destroy', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="{{ route('feedback.edit', ['feedback' => $message]) }}">Ред.</a>
                                <button type="submit" class="btn btn-danger">Удал.</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Сообщений нет</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div>{{ $messages->links() }}</div>
    </div>
@endsection


