<?php

use App\Http\Controllers\Common\SuccessController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;

// e. Страница авторизации.
Auth::routes();

// a. Страница приветствия.
Route::get('/', function () {
    return view('common.welcome');
})->name('welcome');

// Страница успешного события
Route::get('/success', [SuccessController::class, 'index'])
    ->name('success');

// Страница обратной связи
Route::get('/feedback', [FeedbackController::class, 'create'])
    ->name('feedback.create');
// Сохранение сообщения в базу
Route::post('/feedback/store', [FeedbackController::class, 'store'])
    ->name('feedback.store');

// Форма заказа на получение выгрузки данных из какого-либо источника
Route::get('/order', [OrderController::class, 'create'])
    ->name('order.create');
// Сохранение источника в базу
Route::post('/order/store', [OrderController::class, 'store'])
    ->name('order.store');

// Список новостей
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

// d. Страница вывода конкретной новости.
Route::get('/news/{news}', [NewsController::class, 'show'])
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

    // Редактирование источников данных
    Route::resource('sources', AdminSourceController::class);

    // Редактирование заказов на выгрузку данных
    Route::resource('orders', AdminOrderController::class);

    // Редактирование сообщений
    Route::resource('feedback', AdminFeedbackController::class);
});
