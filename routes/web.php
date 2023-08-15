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

// Frontend
// Clrear

// 1 Likes belongs + list
// 2 Comments belongs + list
// 3 Admin Policy
// 4 Settings
// 5 Frontend
// 6 Clear



// Authentication
Route::group(['namespace' => 'Auth'], function ()
{
    // Login
    Route::get('/login', 'LoginController')->middleware('guest')->name('auth.login');
    Route::post('/login', 'AttemptController')->middleware('guest')->name('auth.attempt');

    // Registration
    Route::get('/register', 'RegisterController')->middleware('guest')->name('auth.register');
    Route::post('/register', "CreateController")->middleware('guest')->name('auth.create');

    // Logout
    Route::post('/logout', 'LogoutController')->middleware('auth')->name('auth.logout');
    
    // Hash password
});



// Site page
Route::group(['namespace' => 'Site'], function ()
{
    Route::get('/main', 'MainController')->name('site.main');
});



// Posts
Route::group(['namespace' => 'Post'], function ()
{
    // Create
    Route::get('/create', 'CreateController')->middleware('auth')->name('posts.create');
    Route::post('/create', 'StoreController')->middleware('auth')->name('posts.store');

    // Edit
    Route::get('/edit/{post}', 'EditController')->middleware('auth')->name('posts.edit');
    Route::patch('/edit', 'UpdateController')->middleware('auth')->name('posts.update');

    // // Comment
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function ()
    {
        Route::post('/{post}', 'CommentController')->middleware('auth')->name('comments.comment');
    });
    // Likes
    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function ()
    {
        Route::get('/index/{post}', 'IndexController')->name('likes.index');
        Route::patch('/{post}', 'LikeController')->middleware('auth')->name('likes.like');
        Route::delete('/{post}', 'UnlikeController')->middleware('auth')->name('likes.unlike');
    });

    Route::delete('/{post}/delete', 'DestroyController')->middleware('auth')->name('posts.destroy');
    Route::get('/posts/{post}/show', 'ShowController')->name('posts.show');
    Route::get('/tags', 'TagController')->name('tags.index');

    // Likes belogns to many
    // amount of likes and comments
});



// Users
Route::group(['namespace' => 'User'], function ()
{
    Route::get('/profile/{user}', 'ProfileController')->name('users.profile');
    Route::get('/page', 'PageController')->middleware('auth')->name('users.page');
    
    Route::get('/settings', 'SettingsController')->middleware('auth')->name('users.settings');
    Route::patch('/settings', 'UpdateController')->middleware('auth')->name('users.update');
});



// Admin 
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function ()
{
    Route::get('/panel', 'IndexController')->name('admin.index');
    Route::get('/users', 'UsersController')->name('admin.users');
    Route::get('/tags', 'TagsController')->name('admin.tags');
});



// Social
Route::group(['namespace' => 'Social'], function ()
{
    Route::get('/about', 'AboutController')->name('socials.about');
    Route::get('/contacts', 'ContactsController')->name('socials.contacts');
});