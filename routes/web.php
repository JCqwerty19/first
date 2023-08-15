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

// 4 Settings
// 5 Frontend



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
        Route::delete('/{comment}/delete', 'DestroyController')->middleware('auth')->name('comments.destroy');
    });

    // Likes
    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function ()
    {
        Route::get('/index/{post}', 'IndexController')->name('likes.index');
        Route::patch('/{post}', 'LikeController')->middleware('auth')->name('likes.like');
    });

    // Post
    Route::get('/show/{post}', 'ShowController')->name('posts.show');

    // Tag
    Route::get('/tags/{tag}', 'TagController')->name('tags.index');

    // Destroy
    Route::delete('/delete/{post}', 'DestroyController')->middleware('auth')->name('posts.destroy');
});



// Users
Route::group(['namespace' => 'User'], function ()
{
    // Profile
    Route::get('/profile/{user}', 'ProfileController')->name('users.profile');
    
    // Settings
    Route::get('/settings', 'SettingsController')->middleware('auth')->name('users.settings');
    Route::patch('/settings/{user}', 'UpdateController')->middleware('auth')->name('users.update');
});



// Admin 
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function ()
{
    // Admin Panel
    Route::get('/panel', 'IndexController')->name('admin.index');

    // Users
    Route::get('/users', 'UsersController')->name('admin.users');
    Route::delete('/users/destroy/{user}', 'UserDestroyController')->name('admin.users.destroy');

    // Tags
    Route::get('/tags', 'TagsController')->name('admin.tags');
    Route::delete('/tags/destroy/{tag}', 'TagDestroyController')->name('admin.tags.destroy');
});



// Social
Route::group(['namespace' => 'Social'], function ()
{
    // About
    Route::get('/about', 'AboutController')->name('socials.about');

    // Contacts
    Route::get('/contacts', 'ContactsController')->name('socials.contacts');
});