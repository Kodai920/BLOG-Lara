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

Route::get('/','FrontendController@index');

Route::get('/category-single/{category}',[
    'uses' =>'FrontendController@category',
    'as' => 'category.single'
]);

Route::get('/results',[
    'uses' => 'FrontendController@search',
    'as' => 'search.results'
]);

Route::post('/subscribe',[
    'uses' => 'FrontendController@subscribe',
    'as' => 'subscribe'
]);

Route::get('/post/{slug}',[
    'uses' => 'FrontendController@single_post',
    'as' => 'post.single'
]);

Route::get('/tag-single/{tag}',[
    'uses' => 'FrontendController@tag',
    'as' => 'tag.single'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostController');

Route::get('trashed-posts','PostController@trashed')->name('posts.trashed');

Route::get('restore-post/{id}','PostController@restore')->name('posts.restore');

Route::get('kill-post/{id}','PostController@kill')->name('posts.kill');

Route::resource('category','CategoryController');

Route::resource('tags','TagController');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/update-profile',[
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update',
    ]);
});

Route::group(['middleware'=>'auth','admin'],function(){

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings.index'
    ]);

    Route::post('/update-settings',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

});

