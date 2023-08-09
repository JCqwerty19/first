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

// Route::get('/', function () {
//    return view('welcome');
// });



// Аутентификация
// Админка
// Посты + тэги + категории + пагинация + сиды
// Комментарии под постами

Route::group(['namespace' => 'Auth'], function ()
{
    Route::group(['namespace' => 'Login'], function ()
    {
        Route::get('/login', 'IndexController')->middleware('guest')->name('auth.login.index');
        Route::post('/login', 'CheckController')->name('auth.login.check');
    });
    
    Route::group(['namespace' => 'Register', 'prefix' => 'register'], function ()
    {
        Route::get('/register', 'IndexController')->middleware('guest')->name('auth.register.index');
        Route::post('/register', 'CheckController')->name('auth.register.check');
    });

    Route::get('/logout', 'LogoutController')->name('auth.logout');
});

Route::group(['namespace' => 'Admin'], function ()
{
    Route::get('/dashboard', 'DashboardController')->name('admin.dashboard');
});




Route::get('/', function ()
{
    return view('welcome');
})->name('welcome');