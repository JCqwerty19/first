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

Route::get('/', function()
{
    return view('welcome');
});

Route::group(['namespace' => 'Post'], function () 
{
    Route::get('/posts', 'IndexController')->name('posts.index');
    
    Route::get('/posts/create', 'CreateController')->name('posts.create');
    Route::post('/posts', 'StoreController')->name('posts.store');

    Route::get('/posts/edit/{post}', 'EditController')->name('posts.edit');
    Route::patch('/posts', 'UpdateController')->name('posts.update');

    Route::get('/posts/show/{post}', 'ShowController')->name('posts.show');
    Route::delete('/posts', 'DestroyController')->name('posts.destroy');
});

Route::group(['namespace' => 'Category'], function ()
{
    Route::get('/categories/{category}', 'IndexController')->name('categories.index');
});

Route::group(['namespace' => 'Tag'], function ()
{
    Route::get('/tags/{tag}', 'IndexController')->name('tags.index');
});