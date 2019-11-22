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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostController');

Route::get('trashed-posts','PostController@trashed')->name('posts.trashed');

Route::get('restore-post/{id}','PostController@restore')->name('posts.restore');

Route::get('kill-post/{id}','PostController@kill')->name('posts.kill');

Route::resource('category','CategoryController');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings.index'
    ]);

    Route::post('/update-settings',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

});

