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

Route::get('/', [
    'uses' => 'PostsController@getIndex',
    'as' => 'blog.index'
]);

Route::group(['prefix' => 'posts'], function () {
    Route::get('create', [
        'uses' => 'PostsController@getCreatePost',
        'as' => 'post.create'
    ]);
    
    Route::post('upsert', [
        'uses' => 'PostsController@postUpsertPost',
        'as' => 'post.upsert'
    ]);
    
    Route::get('{id}', [
        'uses' => 'PostsController@getPost',
        'as' => 'post.view'
    ]);
});