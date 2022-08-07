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
    
    $search = "";
    return view('products.index');
});

Route::resource('inventory', 'ProductController');
Route::get('inventory/search', 'ProductController@search')->name('inventory.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
