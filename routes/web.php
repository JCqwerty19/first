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
    return view('welcome');
});

// Auth
// Guest = Post, Tags
// User = Post, Comment, Tags
// Admin = Users, Post, Comment, Tags CRUD all

// type, class, value, name, id, placeholder, other,

Route::group(['namespace' => 'Auth'], function ()
{
    Route::get('/login', 'LoginController')->middleware('guest')->name('auth.login');
    Route::post('/login', 'AttemptController')->middleware('guest')->name('auth.attempt');

    Route::get('/register', 'RegisterController')->middleware('guest')->name('auth.register');
    Route::post('/register', "CreateController")->middleware('guest')->name('auth.create');

    Route::post('/logout', 'LogoutController')->middleware('auth')->name('auth.logout');
});

Route::group(['namespace' => 'Guest', 'middleware' => 'guest'], function ()
{
    Route::get('/main', 'MainController')->name('guests.main');
    Route::get('/posts/view/{post}', 'ViewController')->name('guests.view');
});

Route::group(['namespace' => 'Post'], function ()
{
    Route::get('/create', 'CreateController')->middleware('auth')->name('posts.create');
    Route::post('/create', 'StoreController')->middleware('auth')->name('posts.store');

    Route::get('/edit/{post}', 'EditController')->middleware('auth')->name('posts.edit');
    Route::patch('/edit', 'UpdateController')->middleware('auth')->name('posts.update');

    Route::patch('/{post}/like', 'LikeController')->middleware('auth')->name('posts.like');
    Route::delete('/{post}/delete', 'DestroyController')->middleware('auth')->name('posts.destroy');
});

Route::group(['namespace' => 'User'], function ()
{
    //
});