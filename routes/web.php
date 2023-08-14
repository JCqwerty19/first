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

Route::group(['namespace' => 'Site'], function ()
{
    Route::get('/main', 'MainController')->name('site.main');
});

Route::group(['namespace' => 'Post'], function ()
{
    Route::get('/create', 'CreateController')->middleware('auth')->name('posts.create');
    Route::post('/create', 'StoreController')->middleware('auth')->name('posts.store');

    Route::get('/edit/{post}', 'EditController')->middleware('auth')->name('posts.edit');
    Route::patch('/edit', 'UpdateController')->middleware('auth')->name('posts.update');

    Route::patch('/{post}/like', 'LikeController')->middleware('auth')->name('posts.like');
    Route::delete('/{post}/delete', 'DestroyController')->middleware('auth')->name('posts.destroy');
    Route::post('/{post}/comment', 'CommentController')->middleware('auth')->name('posts.comment');

    Route::get('/posts/{post}/show', 'ShowController')->name('posts.show');

    Route::get('/tags', 'TagController')->name('tags.index');
});

Route::group(['namespace' => 'User'], function ()
{
    Route::get('/profile/{user}', 'ProfileController')->name('users.profile');
    Route::get('/page', 'PageController')->middleware('auth')->name('users.page');
    // Route::get('/settings')
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function ()
{
    Route::get('/users', 'UsersController')->name('admin.users');
    Route::get('/posts', 'PostsController')->name('admin.posts');
    Route::get('/posts', 'TagsController')->name('admin.tags');
});

Route::group(['namespace' => 'Social'], function ()
{
    Route::get('/about', 'AboutController')->name('socials.about');
    Route::get('/contacts', 'ContactsController')->name('socials.contacts');
});