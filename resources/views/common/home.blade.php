@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>Главная страница</h1></div>

                <div class="card-body">
                    <div class="content-block content-block_homework">
                        <div class="task-block js-homework-description-container">
                            <div class="task-block-teacher">
                                <h4>1. Добавить в проект несколько контроллеров. Создать минимум 4 страницы. К примеру:</h4>

                                <ol>
                                    <li>Страницу приветствия.</li>
                                    <li>Страницу категорий новостей.</li>
                                    <li>Страницу вывода новостей по конкретной категории.</li>
                                    <li>Страницу вывода конкретной новости.</li>
                                    <li>Страницу авторизации.</li>
                                    <li>Страницу добавления новости.</li>
                                </ol>

                                <h4>2. Выбрать и сверстать дизайн для станиц приложения. Он не должен быть сложным, но обязательно должен содержать в себе 4 блока: блок шапки сайта, подвала, место вывода контента и область меню.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
