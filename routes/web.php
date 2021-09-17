<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/admin',function(){
    return view('admin.dashboard');
});

//user

Route::get('/users/add',[UserController::class,'index'])->name('users.add');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/list',[UserController::class,'show'])->name('users.show');
Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/users/update',[UserController::class,'update'])->name('users.update');
Route::get('/users/status-update/{id}',[UserController::class,'status_update'])->name('users.status-update');
Route::post('/users/check', [UserController::class,'check'])->name('email_available.check');