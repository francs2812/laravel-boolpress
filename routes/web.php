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

Auth::routes();
//ROTTE PRIVATE
Route::middleware('auth') // autenticazione
    ->namespace('Admin') // controller
    ->name('admin.') // nome rotte
    ->prefix('admin') // url rotte
    ->group(function() {

        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
        Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');

});

//ROTTE PUBBLICHE
Route::get('{any?}', 'HomeController@index')->where('any', '.*')->name('home');