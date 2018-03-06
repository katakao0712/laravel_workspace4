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

Route::get('users','UsersController@index')->name('users.index');
//「HTTPリクエストが GET で http://example.com/users にアクセスされたら、UsersController の index() メソッドを通ってね。別名（View名）は users.index だよ。」