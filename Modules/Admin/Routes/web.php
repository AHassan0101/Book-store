<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/categories', 'CategoryController@index')->name('admin.categories');
    Route::get('/categories/{slug}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('/categories/update', 'CategoryController@update')->name('admin.categories.update');

    Route::get('/books', 'BookController@index')->name('admin.books');
    Route::get('/books/add', 'BookController@create')->name('admin.books.create');
    Route::post('/books/store', 'BookController@store')->name('admin.books.store');
    Route::get('/books/{slug}', 'BookController@edit')->name('admin.books.edit');
    Route::post('/books/update', 'BookController@update')->name('admin.books.update');
    Route::post('/books/delete', 'BookController@destroy')->name('admin.books.destroy');
    Route::post('/books/stock/update', 'BookController@stockUpdate')->name('admin.books.stock.update');

    Route::get('/users', 'UserController@index')->name('admin.users');

    Route::get('/orders', 'OrderController@index')->name('admin.orders');
    Route::get('/orders/{id}', 'OrderController@edit')->name('admin.orders.edit');
    Route::get('/orders/view/{id}', 'OrderController@view')->name('admin.orders.view');
});
