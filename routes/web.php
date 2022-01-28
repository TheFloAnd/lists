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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/hinzufügen', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::get('/bearbeiten/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('/anzeigen/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::resource('home', App\Http\Controllers\HomeController::class);
