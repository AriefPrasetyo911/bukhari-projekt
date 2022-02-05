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
})->name('/');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Auth::routes();

Route::group(['prefix' => 'administrator', 'middleware'=>'is_admin'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
    Route::group(['prefix' => 'soal'], function(){
        Route::get('/get-soal-dashboard', [App\Http\Controllers\HomeController::class, 'getSoalDashboard'])->name('get-soal-dashboard');
        //DETAIL
        Route::get('/detail/{jenis_soal}/{soal_id}', [App\Http\Controllers\DetailSoalController::class, 'detail'])->name('detail-soal');
        Route::post('/tambah-soal', [\App\Http\Controllers\DetailSoalController::class, 'tambahSoal'])->name('tambahSoal');
        Route::patch('/ubah-soal', [\App\Http\Controllers\DetailSoalController::class, 'ubahSoal'])->name('ubahSoal');
        Route::delete('/hapus-soal/{id}', [\App\Http\Controllers\DetailSoalController::class, 'hapusSoal'])->name('hapusSoal');
        Route::get('/twk/ambil-data/edit/{id}', [\App\Http\Controllers\TWKController::class, 'ambilData'])->name('twk.ambilData');
        Route::get('/twk/detail/pilihan-ganda/{id}', [\App\Http\Controllers\TWKController::class, 'detailPilihanGanda'])->name('twk.detailPilihanGanda');

        Route::get('/get/pembahasan/{id}', [\App\Http\Controllers\DetailSoalController::class, 'getPembahasan'])->name('getPembahasan');
        Route::post('/pembahasan/tambah', [\App\Http\Controllers\DetailSoalController::class, 'tambahPembahasan'])->name('tambahPembahasan');
        
    });
    Route::group(['prefix' => 'try-out'], function(){
        //TWK
        Route::get('/twk', [App\Http\Controllers\TryOutController::class, 'TryOutTWK'])->name('try-out.twk');
        Route::get('/get-soal-twk', [App\Http\Controllers\TryOutController::class, 'getSoalTWK'])->name('try-out.get-soal-twk');
        Route::get('/twk/edit/{id}', [App\Http\Controllers\TryOutController::class, 'editSoalTWK'])->name('try-out.edit-soal-twk');
        Route::patch('/twk/update', [App\Http\Controllers\TryOutController::class, 'updateSoalTWK'])->name('try-out.update-soal-twk');
        Route::post('/twk/tambah-soal', [\App\Http\Controllers\TryOutController::class, 'tambahSoalTWK'])->name('try-out.tambah-soal.twk');
        Route::delete('/twk/hapus-soal/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusSoalTWK'])->name('try-out.hapus-soal.twk');
        //TIU
        Route::get('/tiu', [App\Http\Controllers\TryOutController::class, 'TryOutTIU'])->name('try-out.tiu');
        Route::get('/get-soal-tiu', [App\Http\Controllers\TryOutController::class, 'getSoalTIU'])->name('try-out.get-soal-tiu');
        Route::post('/tiu/tambah-soal', [\App\Http\Controllers\TryOutController::class, 'tambahSoalTIU'])->name('try-out.tambah-soal.tiu');
        Route::get('/tiu/edit/{id}', [App\Http\Controllers\TryOutController::class, 'editSoalTIU'])->name('try-out.edit-soal-tiu');
        Route::patch('/tiu/update', [App\Http\Controllers\TryOutController::class, 'updateSoalTIU'])->name('try-out.update-soal-tiu');
        Route::delete('/tiu/hapus-soal/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusSoalTIU'])->name('try-out.hapus-soal.tiu');
        //TKP
        Route::get('/tkp', [App\Http\Controllers\TryOutController::class, 'TryOutTKP'])->name('try-out.tkp');
        Route::get('/get-soal-tkp', [App\Http\Controllers\TryOutController::class, 'getSoalTKP'])->name('try-out.get-soal-tkp');
        Route::post('/tkp/tambah-soal', [\App\Http\Controllers\TryOutController::class, 'tambahSoalTKP'])->name('try-out.tambah-soal.tkp');
        Route::get('/tkp/edit/{id}', [App\Http\Controllers\TryOutController::class, 'editSoalTKP'])->name('try-out.edit-soal-tkp');
        Route::patch('/tkp/update', [App\Http\Controllers\TryOutController::class, 'updateSoalTKP'])->name('try-out.update-soal-tkp');
        Route::delete('/tkp/hapus-soal/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusSoalTKP'])->name('try-out.hapus-soal.tkp');

        Route::get('/jadwal', [App\Http\Controllers\TryOutController::class, 'TrySetJadwal'])->name('try-out.jadwal');
        Route::get('/jadwal/data', [App\Http\Controllers\TryOutController::class, 'dataJadwal'])->name('try-out.data-jadwal');
        Route::post('/jadwal/tambah', [\App\Http\Controllers\TryOutController::class, 'tambahJadwal'])->name('try-out.tambah-jadwal');
        Route::get('/jadwal/edit/{id}', [\App\Http\Controllers\TryOutController::class, 'editJadwal'])->name('try-out.edit-jadwal');
        Route::patch('/jadwal/update', [\App\Http\Controllers\TryOutController::class, 'updateJadwal'])->name('try-out.update-jadwal');
        Route::delete('/jadwal/hapus/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusJadwal'])->name('try-out.hapus-jadwal');
    });
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
