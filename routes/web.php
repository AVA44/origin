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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('inventory', 'ProductController');

Route::resource('category', 'CategoryController');

Route::delete('/category', 'CategoryController@delete')->name('category.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

if (env('APP_ENV') === 'production') {
      URL::forceScheme('https');
  }