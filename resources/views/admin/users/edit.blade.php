@extends('layouts.admin')

@section('title')Редактировать пользователя - @parent @stop

@section('content')
    <div class="col-md-8 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>

        <div class="mb-2">
            @include('common.result')
            <form class="row g-3" method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Имя *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ $user->name }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin" value="1"
                               @if ($user->is_admin)
                               checked
                            @endif>
                        <label for="is_admin">Админ</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

