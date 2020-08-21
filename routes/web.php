<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'StaticController@index');

Auth::routes();

Route::post('/login', 'Auth\LoginController@login')->name('login');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'PagesController@cart')->name('cart');
Route::post('/add-to-cart', 'PagesController@addToCart')->name('add.to.cart');
Route::post('/remove-to-cart', 'PagesController@removeToCart')->name('remove.to.cart');
Route::post('/view-book', 'PagesController@viewBook')->name('view.book');
Route::post('/order-complete', 'PagesController@orderComplete')->name('order.complete');
Route::get('/shop', 'StaticController@shop')->name('shop');
Route::get('/book-details/{slug}', 'StaticController@bookDetails')->name('book.details');
Route::get('/book/{query?}', 'StaticController@searchBook')->name('book.search');
