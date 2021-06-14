@extends('layouts.app')

@section('title')Личный кабинет@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Личный кабинет пользователя</h1>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        @include('common.result')
        <div class="container">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Данные пользователя</h3>
                            <ul class="list-group">
                                <li class="list-group-item"><b>ID:</b> {{ $user->id }}</li>
                                <li class="list-group-item"><b>Имя:</b> {{ $user->name }}</li>
                                <li class="list-group-item"><b>Email:</b> {{ $user->email }}</li>
                                <li class="list-group-item"><b>Email проверен:</b>
                                    @if ($user->email_verified_at)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </li>
                                <li class="list-group-item"><b>Создан:</b> {{ $user->created_at->format('d.m.Y H:i') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4>Действия</h4>
                            <ul class="list-group">
                                @if ($user->is_admin)
                                    <li class="list-group-item"><a href="{{ $adminLink }}" title="Перейти в панель администратора">В админку</a></li>
                                @endif
                                <li class="list-group-item"><a href="{{ $logoutLink }}" title="Выйти">Выход</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
