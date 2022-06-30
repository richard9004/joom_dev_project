<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TemplatesController;

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

Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::post('register',[AuthController::class, 'register_user'])->name('register');
});


Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class, 'home'])->name('home');
    Route::get('templates',[TemplatesController::class, 'index'])->name('templates');
    Route::get('create-new-template',[TemplatesController::class, 'create_new_template'])->name('create-new-template');
    Route::post('save-template',[TemplatesController::class, 'save_template'])->name('save-template');
    Route::put('update-template/{id}',[TemplatesController::class, 'update_template'])->name('update-template');
    Route::get('edit-template/{id}',[TemplatesController::class, 'edit'])->name('edit-template');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
});





