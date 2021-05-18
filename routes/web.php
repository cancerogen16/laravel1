<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\HomeController;
use App\Http\Controllers\Common\WelcomeController;

use App\Http\Controllers\News\PostController;


// b. Страница категорий новостей.
// c. Страница вывода новостей по конкретной категории.

// e. Страница авторизации.
// f. Страница добавления новости.

Auth::routes();

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// a. Страница приветствия.
Route::get('/welcome', function () {
    return view('common.welcome');
})->name('welcome');

Route::get('/news', [PostController::class, 'index']);

// d. Страница вывода конкретной новости.
Route::get('/news/{id}', [PostController::class, 'show']);

Route::group(['namespace' => 'App\Http\Controllers\News', 'prefix' => 'news'], function () {
    Route::resource('posts', 'PostController')->names('news.posts');
});