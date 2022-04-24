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
    Route::post('bank/tambah', [\App\Http\Controllers\HomeController::class, 'tambahBank'])->name('tambahBank');
    Route::group(['prefix' => 'soal'], function(){
        Route::get('/get-soal-dashboard', [App\Http\Controllers\HomeController::class, 'getSoalDashboard'])->name('get-soal-dashboard');
        //DETAIL
        Route::get('/detail/{jenis_soal}/{soal_id}', [App\Http\Controllers\DetailSoalController::class, 'detail'])->name('detail-soal');
        Route::post('/tambah-soal', [\App\Http\Controllers\DetailSoalController::class, 'tambahSoal'])->name('tambahSoal');
        Route::post('/tambah-soal/tkp', [\App\Http\Controllers\DetailSoalController::class, 'tambahSoalTKP'])->name('tambahSoalTKP');
        Route::get('/get-data/tkp/{id_paket}', [\App\Http\Controllers\DetailSoalController::class, 'getDataTKP'])->name('getDataTKP');
        Route::get('/get-data/tkp/skor/{id_soal}/{id_paket}', [\App\Http\Controllers\DetailSoalController::class, 'getDataSkorTKP'])->name('getDataSkorTKP');
        Route::patch('/ubah-soal/tkp/', [\App\Http\Controllers\DetailSoalController::class, 'ubahSoalTKP'])->name('ubahSoal.TKP');
        Route::patch('/ubah-soal', [\App\Http\Controllers\DetailSoalController::class, 'ubahSoal'])->name('ubahSoal');
        Route::delete('/hapus-soal/{id}', [\App\Http\Controllers\DetailSoalController::class, 'hapusSoal'])->name('hapusSoal');
        Route::get('/twk/ambil-data/edit/{id}', [\App\Http\Controllers\TWKController::class, 'ambilData'])->name('twk.ambilData');
        Route::get('/twk/detail/pilihan-ganda/{id}', [\App\Http\Controllers\TWKController::class, 'detailPilihanGanda'])->name('twk.detailPilihanGanda');

        Route::get('/get/pembahasan/{id}', [\App\Http\Controllers\DetailSoalController::class, 'getPembahasan'])->name('getPembahasan');
        Route::post('/pembahasan/tambah', [\App\Http\Controllers\DetailSoalController::class, 'tambahPembahasan'])->name('tambahPembahasan');
        Route::delete('/pembahasan/hapus/detail-soal/{detail_id}', [\App\Http\Controllers\DetailSoalController::class, 'hapusPembahasan1'])->name('hapusPembahasan.detailSoal');
        Route::delete('/pembahasan/hapus/{pembahasan_id}', [\App\Http\Controllers\DetailSoalController::class, 'hapusPembahasan'])->name('hapusPembahasan');
        Route::get('/pembahasan/cek/detail-soal/{id_paket}', [\App\Http\Controllers\DetailSoalController::class, 'cekDetaiSoal'])->name('getPembahasan.cekDetailSoal');
        Route::get('/pembahasan/cek/{pembahasan_id}', [\App\Http\Controllers\DetailSoalController::class, 'cekPembahasan'])->name('getPembahasan.cekPembahasan');
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
        Route::get('/jadwal/get-data/{paket}', [App\Http\Controllers\TryOutController::class, 'getDataJadwal'])->name('try-out.getDataJadwal');
        Route::get('/jadwal/detail/{id}', [App\Http\Controllers\TryOutController::class, 'detailJadwal'])->name('try-out.detailJadwal');
        Route::get('/jadwal/data', [App\Http\Controllers\TryOutController::class, 'dataJadwal'])->name('try-out.data-jadwal');
        Route::post('/jadwal/tambah', [\App\Http\Controllers\TryOutController::class, 'tambahJadwal'])->name('try-out.tambah-jadwal');
        Route::get('/jadwal/edit/{id}', [\App\Http\Controllers\TryOutController::class, 'editJadwal'])->name('try-out.edit-jadwal');
        Route::patch('/jadwal/update', [\App\Http\Controllers\TryOutController::class, 'updateJadwal'])->name('try-out.update-jadwal');
        Route::delete('/jadwal/hapus/{id}', [\App\Http\Controllers\TryOutController::class, 'hapusJadwal'])->name('try-out.hapus-jadwal');
    });

    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
        Route::get('/edit/{id}', [\App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');
        Route::patch('/update', [\App\Http\Controllers\HomeController::class, 'profileUpdate'])->name('profile.update');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/data', [\App\Http\Controllers\UserDataController::class, 'userData'])->name('userData');
        Route::get('/data/get', [\App\Http\Controllers\UserDataController::class, 'getuserData'])->name('userData.get');
    });

    Route::group(['prefix' => 'pembayaran'], function(){
        Route::get('/try-out', [\App\Http\Controllers\PembayaranController::class, 'pembayaran'])->name('pembayaran.try-out');
        Route::get('/konfirmasi', [\App\Http\Controllers\PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
        Route::get('/konfirmasi/{id}/{user_id}/{email}', [\App\Http\Controllers\PembayaranController::class, 'kirimKonfirmasi'])->name('konfirmasi.pembayaran');
    });

    Route::group(['prefix' => 'keuangan'], function(){
        Route::get('/top-up', [\App\Http\Controllers\PembayaranController::class, 'keuanganTopUpPage'])->name('keuangan');
        Route::get('/top-up/data', [\App\Http\Controllers\PembayaranController::class, 'keuanganTopUp'])->name('keuangan.topUp');
        Route::get('/top-up/data/json/{id}', [\App\Http\Controllers\PembayaranController::class, 'keuanganTopUpJSON'])->name('keuangan.topUpJSON');
        Route::post('/top-up/konfirmasi', [\App\Http\Controllers\PembayaranController::class, 'keuanganKonfirmasi'])->name('keuanganKonfirmasi');
        Route::get('/top-up/log', [\App\Http\Controllers\PembayaranController::class, 'keuanganTopUpLog'])->name('keuangan.topUpLog');
        Route::get('/top-up/log/data', [\App\Http\Controllers\PembayaranController::class, 'keuanganTopUpLogData'])->name('keuangan.topUpLogData');

        Route::get('/saldo-user', [\App\Http\Controllers\PembayaranController::class, 'saldoUser'])->name('keuangan.saldoUser');
        Route::get('/saldo-user/data', [\App\Http\Controllers\PembayaranController::class, 'saldoUserData'])->name('keuangan.saldoUserData');
    });

    Route::group(['prefix' => 'profil-administrator'], function(){
        Route::get('/', [\App\Http\Controllers\ProfilAdministratorController::class, 'profilAdmin'])->name('profilAdmin');
        Route::get('/edit/{id}', [\App\Http\Controllers\ProfilAdministratorController::class, 'profilAdminEdit'])->name('profilAdmin.edit');
        Route::patch('/update', [\App\Http\Controllers\ProfilAdministratorController::class, 'profilAdminUpdate'])->name('profilAdmin.update');

        Route::patch('/foto-profile/update', [\App\Http\Controllers\ProfilAdministratorController::class, 'fotoProfileUpdate'])->name('fotoProfileUpdate');
        Route::patch('/password/update', [\App\Http\Controllers\ProfilAdministratorController::class, 'passwordUpdate'])->name('passwordUpdate');
    });
});

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'jadwal-try-out'], function(){
        Route::get('/tkp', [\App\Http\Controllers\jadwalTryOutController::class, 'jadwalTKP'])->name('jadwalTKP');
        Route::get('/tiu', [\App\Http\Controllers\jadwalTryOutController::class, 'jadwalTIU'])->name('jadwalTIU');
        Route::get('/twk', [\App\Http\Controllers\jadwalTryOutController::class, 'jadwalTWK'])->name('jadwalTWK');
        //get data
        Route::get('/twk/get-data/{id}', [\App\Http\Controllers\jadwalTryOutController::class, 'getPaketTWK'])->name('jadwalTWK.getData');
        Route::get('/twk/data-jadwal/{id}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'dataJadwalTWK'])->name('dataJadwalTWK');
        Route::get('/twk/cek/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'cekDataTWK'])->name('cekDataTWK');

        Route::get('/tiu/get-data/{id}', [\App\Http\Controllers\jadwalTryOutController::class, 'getPaketTIU'])->name('jadwalTIU.getData');
        Route::get('/tiu/data-jadwal/{id}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'dataJadwalTIU'])->name('dataJadwalTIU');
        Route::get('/tiu/cek/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'cekDataTIU'])->name('cekDataTIU');

        Route::get('/tkp/get-data/{id}', [\App\Http\Controllers\jadwalTryOutController::class, 'getPaketTKP'])->name('jadwalTKP.getData');
        Route::get('/tkp/data-jadwal/{id}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'dataJadwalTKP'])->name('dataJadwalTKP');
        Route::get('/tkp/cek/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'cekDataTKP'])->name('cekDataTKP');
        //pembelian jadwal
        Route::post('pembelian/jadwal/twk', [\App\Http\Controllers\jadwalTryOutController::class, 'beliJadwalTWK'])->name('pembelian-jadwal.twk');
        Route::post('pembelian/jadwal/tiu', [\App\Http\Controllers\jadwalTryOutController::class, 'beliJadwalTIU'])->name('pembelian-jadwal.tiu');
        Route::post('pembelian/jadwal/tkp', [\App\Http\Controllers\jadwalTryOutController::class, 'beliJadwalTKP'])->name('pembelian-jadwal.tkp');
    });

    Route::group(['prefix' => 'try-out'], function(){
        Route::get('/kerjakan/{id}/{jenis}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'kerjakanTryOut'])->name('kerjakan-try-out');
        Route::get('/get-soal/{jenis}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'getSoal'])->name('getSoal');
        Route::get('/kerjakan/soal/{soal_ke}', [\App\Http\Controllers\jadwalTryOutController::class, 'soalKe'])->name('soalKe');
        Route::post('/kirim-hasil-ujian/{jenis}/{id_paket}', [\App\Http\Controllers\jadwalTryOutController::class, 'kirimHasilUjian'])->name('kirimHasilUjian');
    });
});
