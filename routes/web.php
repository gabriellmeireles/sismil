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

Route::get('/admin', function () {
    return redirect()->route('admin.profile');
});
Route::get('/user', function () {
    return redirect()->route('user.profile');
});



Route::middleware(['middleware'=>'prevent.back.history'])->group(function(){
    Auth::routes(['verify' => true]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['checkUserType:admin','auth','prevent.back.history']],function(){
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('perfil',[AdminController::class, 'profile'])->name('admin.profile');
    Route::view('usuario','admin.admin.user')->name('admin.user');
    Route::view('comando-militar','admin.military-command.index')->name('admin.military-command');
    Route::view('regiao-militar','admin.military-region.index')->name('admin.military-region');
    Route::view('organizacao-militar','admin.military-organization.index')->name('admin.military-organization');
    Route::view('estado','admin.state.index')->name('admin.state');
    Route::view('cidade', 'admin.city.index')->name('admin.city');
    Route::view('secao', 'admin.section.index')->name('admin.section');
    Route::view('categoria-concurso', 'admin.contest-category.index')->name('admin.contest-category');
    Route::view('configuracoes-edital', 'admin.contest-notice.index')->name('admin.contest-notice');
    Route::view('area-edital', 'admin.contest-area.index')->name('admin.contest-area');
    Route::view('area-exigencia', 'admin.area-requirement.index')->name('admin.area-requirement');
    Route::view('tipo-candidato', 'admin.candidate-type.index')->name('admin.candidate-type');
    Route::view('candidato', 'admin.candidate.index')->name('admin.candidate');
    Route::group(['middleware' => ['checkUserType:auditor']], function(){
        //para futuras permições por tipo de usuário
    });
});


Route::group(['prefix'=>'user', 'middleware'=>['checkUserType:user','auth','prevent.back.history']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class, 'profile'])->name('user.profile');
    Route::view('ficha-inscricao', 'user.user.form')->name('user.contest-register');

});
