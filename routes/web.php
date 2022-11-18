<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::view('/', 'home');

Auth::routes();

Route::resource('/event', 'App\Http\Controllers\EventController')->except('destroy');
Route::get('/all-events', [App\Http\Controllers\EventController::class, 'loadEvents'])->name('event.loadAll');
Route::delete('/event/delete/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.destroy');
Route::get('/event/sort/{id}', [App\Http\Controllers\EventController::class, 'sortEventBy'])->name('event.filter');
