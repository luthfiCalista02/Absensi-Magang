<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/user',[HomeController::class,'index'])->name('index');
    Route::get('/create',action: [HomeController::class,'create'])->name('user.create');
    Route::post('/store',action: [HomeController::class,'store'])->name('user.store');

    Route::get('/edit/{id}',action: [HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',action: [HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',action: [HomeController::class,'delete'])->name('user.delete');
});

