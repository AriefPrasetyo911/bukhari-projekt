<?php

// use App\Http\Controllers\HomeController as App;
// use Illuminate\Support\Facades\App;
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
    Route::group(['prefix' => 'soal'], function(){
        Route::get('/get-soal-dashboard', [App\Http\Controllers\HomeController::class, 'getSoalDashboard'])->name('get-soal-dashboard');
        Route::get('/detail/{soal_id}', [App\Http\Controllers\DetailSoalController::class, 'index'])->name('detail-soal');
        Route::get('/ubah/{soal_id}', [App\Http\Controllers\SoalController::class, 'index'])->name('ubah-soal');
    });
    Route::group(['prefix' => 'try-out'], function(){
        //TWK
        Route::get('/twk', [App\Http\Controllers\TryOutController::class, 'TryOutTWK'])->name('try-out.twk');
        Route::get('/get-soal-twk', [App\Http\Controllers\TryOutController::class, 'getSoalTWK'])->name('try-out.get-soal-twk');
        Route::get('/twk/edit/{id}', [App\Http\Controllers\TryOutController::class, 'editSoalTWK'])->name('try-out.edit-soal-twk');
        Route::patch('/twk/update', [App\Http\Controllers\TryOutController::class, 'updateSoalTWK'])->name('try-out.update-soal-twk');
        Route::post('/tambah-soal/twk', [\App\Http\Controllers\TryOutController::class, 'tambahSoalTWK'])->name('try-out.tambah-soal.twk');
        Route::delete('/twk/hapus-soal/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusSoalTWK'])->name('try-out.hapus-soal.twk');
        //TIU
        Route::get('/tiu', [App\Http\Controllers\TryOutController::class, 'TryOutTIU'])->name('try-out.tiu');
        Route::get('/tkp', [App\Http\Controllers\TryOutController::class, 'TryOutTKP'])->name('try-out.tkp');
        Route::get('/set-jadwal', [App\Http\Controllers\TryOutController::class, 'TrySetJadwal'])->name('try-out.set-jadwal');
    });
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
