<?php

use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenentuanController;
use App\Http\Controllers\KaryawanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/penentuan', [PenentuanController::class, 'index'])->name('penentuan');

    Route::get('/penentuan/metode/{id}', [PenentuanController::class, 'metode'])->name('metode');

    Route::post('/logout', [LoginController::class, 'keluar'])->name('keluar');

    // Route::middleware(['isAdmin'])->group(function () {


        Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria');

        Route::get('/umur', [CriteriaController::class, 'umur'])->name('umur');

        Route::get('/berat', [CriteriaController::class, 'berat'])->name('berat');

        Route::get('/tinggi', [CriteriaController::class, 'tinggi'])->name('tinggi');

        Route::get('/alergi', [CriteriaController::class, 'alergi'])->name('alergi');



        Route::get('/penentuan/form', [PenentuanController::class, 'create'])->name('form');

        Route::post('/penentuan/form/tambah-data', [PenentuanController::class, 'store'])->name('tambah-data');

        Route::get('/penentuan/form/edit-data/{id}', [PenentuanController::class, 'edit'])->name('edit-data');

        Route::put('/penentuan/form/update-data/{id}', [PenentuanController::class, 'update'])->name('update-data');

        Route::get('/penentuan/form/hapus-data/{id}', [PenentuanController::class, 'destroy'])->name('hapus-data');

        Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif');

        Route::get('alternatif/form', [AlternatifController::class, 'create'])->name('form-alternatif');

        Route::post('alternatif/form/tambah-data', [AlternatifController::class, 'store'])->name('tambah-data-alternatif');

        Route::get('alternatif/form/edit-data/{id}', [AlternatifController::class, 'edit'])->name('edit-data-alternatif');

        Route::put('alternatif/form/update-data/{id}', [AlternatifController::class, 'update'])->name('update-data-alternatif');

        Route::get('alternatif/form/hapus-data/{id}', [AlternatifController::class, 'destroy'])->name('hapus-data-alternatif');
    // });
});


Route::get('/login', [LoginController::class, 'masuk'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('criteria', CriteriaController::class);
    Route::resource('karyawan', KaryawanController::class);

});
