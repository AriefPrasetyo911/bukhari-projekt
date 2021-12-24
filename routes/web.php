<?php

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

Auth::routes();

Route::group(['prefix' => 'administrator', 'middleware'=>'is_admin'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
