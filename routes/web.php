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

Route::get('/', function () {
    return view('guest.welcome');
});
Auth::routes();

//rotte guest
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/show/{slug}', 'PostController@show')->name('posts.show');
Route::get('/create', 'PostController@create')->name('posts.create');




Route::name('admin.')->prefix('admin')
      ->namespace('Admin')
      ->middleware('auth')
      ->group(function() {
      Route::get('/', 'HomeController@index')
      ->name('home');
      Route::resource('posts','PostController');
      });
