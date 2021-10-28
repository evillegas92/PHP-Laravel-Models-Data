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

Route::get('/', 'PostsController@getIndex')->name('blog.index');

Route::group(['prefix' => 'posts'], function () {
    Route::get('create', function () {
        return view('blog.create');
    })->name('post.create');
    
    Route::post('upsert', function (\Illuminate\Http\Request $request) {
        return redirect()->route('blog.index')->with('info', 'Post created/updated successfully.');
    })->name('post.upsert');
    
    Route::get('{id}', function ($id) {
        return view('blog.post');
    })->name('post.view');
});