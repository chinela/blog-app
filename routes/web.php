<?php

use App\Http\Controllers\PostController;
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

Route::get('/', 'PostController@index')->middleware('auth')->name('post.index');
Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function () {
    Route::get('/add', 'PostController@create')->name('post.create');
    Route::get('/my-posts', 'PostController@userPosts')->name('post.user.post');
    Route::post('/', 'PostController@store')->name('post.store');
    Route::get('/{slug}', 'PostController@show')->name('post.show');
    Route::get('/{slug}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/{slug}/update', 'PostController@update')->name('post.update');
    Route::delete('/{slug}', 'PostController@delete')->name('post.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
