<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['middleware'=>'prevent.back.history'])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','prevent.back.history']],function(){
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class, 'settings'])->name('admin.settings');
    Route::view('user','admin.user')->name('user');
});


Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','prevent.back.history']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class, 'profile'])->name('user.profile');
    Route::get('settings',[UserController::class, 'settings'])->name('user.settings');
});