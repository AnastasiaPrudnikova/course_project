<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', 'AuthController@logout')->name('logout');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->middleware('user');;


Route::get('create', [PostController::class, 'create'])->name('create')->middleware('user');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('user');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('user');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('user');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('user');

