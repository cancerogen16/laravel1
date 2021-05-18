<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\HomeController;

use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\PostController;


// b. Страница категорий новостей.
// c. Страница вывода новостей по конкретной категории.


// f. Страница добавления новости.

// e. Страница авторизации.
Auth::routes();

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// a. Страница приветствия.
Route::get('/welcome', function () {
    return view('common.welcome');
})->name('welcome');

// Категории новостей
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

// Админка портала
$groupData = [
    'namespace' => 'App\Http\Controllers\News\Admin',
    'prefix' => 'admin/news',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'create', 'update', 'destroy'];

    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('news.admin.categories');
});

// Редактирование новостей в админке
$groupData = [
    'namespace' => 'App\Http\Controllers\News\Admin',
    'prefix' => 'admin/news',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'create', 'update', 'destroy'];

    Route::resource('posts', 'PostController')
        ->only($methods)
        ->names('news.admin.posts');
});

Route::get('/news', [PostController::class, 'index']);

// d. Страница вывода конкретной новости.
Route::get('/news/{id}', [PostController::class, 'show']);
