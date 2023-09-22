<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\JenisUnitOrganisasiController;
use App\Http\Controllers\Admin\TingkatPendidikanController;
use App\Http\Controllers\Admin\PendidikanController;

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
    return view('auth.login');
})->name('home');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // KONFIGURASI
    Route::get('/konfigurasi', [KonfigurasiController::class, 'index'])
        ->name('konfigurasi');
    Route::patch('/konfigurasi/update', [KonfigurasiController::class, 'update'])
        ->name('update_konfigurasi');

    // USERS
    Route::get('/user', [UserController::class, 'index'])
        ->name('user');
    Route::get('/user/tambah', [UserController::class, 'create'])
        ->name('tambah_user');
    Route::post('/user/simpan', [UserController::class, 'store'])
        ->name('simpan_user');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])
        ->name('edit_user');
    Route::patch('/user/update/{id}', [UserController::class, 'update'])
        ->name('update_user');
    Route::delete('/user/hapus/{id}', [UserController::class, 'destroy'])
        ->name('hapus_user');
    Route::put('/user/password/{id}', [UserController::class, 'password'])
        ->name('password_user');

    // PEGAWAI
    Route::get('/pegawai', [PegawaiController::class, 'index'])
        ->name('pegawai');
    Route::get('/pegawai/tambah', [PegawaiController::class, 'create'])
        ->name('tambah_pegawai');
    Route::post('/pegawai/simpan', [PegawaiController::class, 'store'])
        ->name('simpan_pegawai');
    Route::get('/pegawai/detail/{id}', [PegawaiController::class, 'show'])
        ->name('detail_pegawai');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])
        ->name('edit_pegawai');
    Route::patch('/pegawai/update/{id}', [PegawaiController::class, 'update'])
        ->name('update_pegawai');
    Route::delete('/pegawai/hapus/{id}', [PegawaiController::class, 'destroy'])
        ->name('hapus_pegawai');
    Route::put('/pegawai/password/{id}', [PegawaiController::class, 'password'])
        ->name('password_pegawai');
    Route::post('/pegawai/import', [PegawaiController::class, 'import'])
        ->name('import_pegawai');
    Route::get('/pegawai/sinkron/{nip}', [PegawaiController::class, 'sinkron'])
        ->name('sinkron_pegawai');

    // USER PEGAWAI
    Route::get('/akun', [AkunController::class, 'index'])
        ->name('akun');
    Route::get('/akun/tambah', [AkunController::class, 'create'])
        ->name('tambah_akun');
    Route::post('/akun/simpan', [AkunController::class, 'store'])
        ->name('simpan_akun');
    Route::get('/akun/edit/{id}', [AkunController::class, 'edit'])
        ->name('edit_akun');
    Route::patch('/akun/update/{id}', [AkunController::class, 'update'])
        ->name('update_akun');
    Route::delete('/akun/hapus/{id}', [AkunController::class, 'destroy'])
        ->name('hapus_akun');
    Route::put('/akun/password/{id}', [AkunController::class, 'password'])
        ->name('password_akun');
    // Route::get('/pegawai/akun', [PegawaiController::class, 'akun'])
    //     ->name('akun_pegawai');






    Route::get('/import', function () {
        $data = [
            'title' => 'BACKUP DAN RESTORE'
        ];
        return view('admin.import.index', $data);
    })->name('import');




    // Jenis Unit Organisasi
    Route::post('/import-jenis-unit-organisasi', [
        JenisUnitOrganisasiController::class, 'import'
    ])->name('import_jenis_unit_organisasi');


    // Tingkat Pendidikan
    Route::post('/import-tingkat-pendidikan', [
        TingkatPendidikanController::class, 'import'
    ])->name('import_tingkat_pendidikan');

    // Pendidikan
    Route::post('/import-pendidikan', [
        PendidikanController::class, 'import'
    ])->name('import_pendidikan');
});