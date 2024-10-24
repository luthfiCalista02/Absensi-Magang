<?php

use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'dashboard']);

Route::get('/user',[HomeController::class,'index'])->name('index');
Route::get('/create',action: [HomeController::class,'create'])->name('user.create');
Route::post('/store',action: [HomeController::class,'store'])->name('user.store');

Route::get('/edit/{id}',action: [HomeController::class,'edit'])->name('user.edit');
Route::put('/update/{id}',action: [HomeController::class,'update'])->name('user.update');
Route::delete('/delete/{id}',action: [HomeController::class,'delete'])->name('user.delete');