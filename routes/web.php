<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Страница приветствия пользователей';
});

Route::get('/about', function () {
    return 'Страница с информацией о проекте';
});

Route::get('/new/{id}', function (int $id) {
    return 'Страница для вывода одной новости #' . $id;
});

Route::get('/news', function () {
    return 'Страница для вывода нескольких новостей';
});
