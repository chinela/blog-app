<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PostController@index')->name('admin.dashboard');
Route::get('/users', 'UserController@index')->name('admin.users');
Route::get('/categories', 'CategoryController@index')->name('admin.categories');
Route::delete('/posts', 'PostController@delete')->name('admin.post.delete');
Route::get('/posts/{slug}/edit', 'PostController@edit')->name('admin.post.edit');
Route::put('/posts/{slug}/update', 'PostController@update')->name('admin.post.update');
