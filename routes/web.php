<?php

use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenilaianController;
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

    Route::post('/logout', [LoginController::class, 'keluar'])->name('keluar');

    Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria');

    Route::resource('penilaian', PenilaianController::class);

    Route::get('/admin/penilaian/topsis', [PenilaianController::class, 'tampilkanHasilTopsis'])->name('penilaian.topsis');

});


Route::get('/login', [LoginController::class, 'masuk'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::prefix('admin')->name('admin.')->group(function() {

    Route::resource('criteria', CriteriaController::class);

    Route::resource('karyawan', KaryawanController::class);
});
