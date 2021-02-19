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
    return view('welcome');
});

Route::get('tests/test','TestController@index');

// 認証のオンオフ
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// postのデフォルトアクション全てをルート指定する
// これで指定した場合、posts/でアクセスするとインデックスに飛ぶが、
// posts/indexに飛ぶと非表示になる
// Route::resource('post', 'PostController');

Route::group(['prefix' => 'post','middleware' => 'auth'],function () {
    Route::get('index' , 'PostController@index')->name('post.index');
    Route::get('create' , 'PostController@create')->name('post.create');
    Route::post('store' , 'PostController@store')->name('post.store');
    Route::get('show/{id}' , 'PostController@show')->name('post.show');
});

