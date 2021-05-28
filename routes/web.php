<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

// e. Страница авторизации.
Auth::routes();

// a. Страница приветствия.
Route::get('/', function () {
    return view('common.welcome');
})->name('welcome');

// Список новостей
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

// d. Страница вывода конкретной новости.
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

// b. Страница категорий новостей.
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

// c. Страница вывода новостей по конкретной категории.
Route::get('/categories/{id}/news', [CategoryController::class, 'show'])
    ->where('id', '\d+');


/* Админка портала */
// Панель администратора
Route::get('/admin', [MainController::class, 'index'])
    ->name('admin.index');

Route::group(['prefix' => 'admin'], function () {
    // Редактирование рубрик новостей в админке
    Route::resource('categories', AdminCategoryController::class);

    // Редактирование новостей в админке
    // f. Страница добавления новости.
    Route::resource('news', AdminNewsController::class);
});
