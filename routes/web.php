<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    PangkalanController,
    BarangMasukController,
    DistribusiController,
    UserController
};

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
    return redirect('dashboard');
});

Route::get('laporan', function () {
    return view('pages.distribusi.manajer.laporan');
});


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'actionLogin'])->name('login.action');

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'actionLogout'])->name('logout');

    Route::get('surat/{id}', [DistribusiController::class, 'suratJalan'])->name('surat');

    Route::middleware('admin')->group(function () {
        // admin
        Route::resource('pangkalan', PangkalanController::class);
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        //barang
        Route::get('barang', [BarangMasukController::class, 'index'])->name('barang.index');
        Route::get('barang/create', [BarangMasukController::class, 'create'])->name('barang.create');
        Route::get('barang/edit/{id}', [BarangMasukController::class, 'edit'])->name('barang.edit');
        Route::patch('barang/edit/{id}', [BarangMasukController::class, 'update'])->name('barang.update');
        Route::post('barang', [BarangMasukController::class, 'store'])->name('barang.store');
        Route::delete('barang/{id}', [BarangMasukController::class, 'destroy'])->name('barang.destroy');

        //distribusi
        Route::get('distribusi', [DistribusiController::class, 'index'])->name('distribusi.index');
        Route::post('distribusi', [DistribusiController::class, 'store'])->name('distribusi.store');
        Route::get('distribusi/submit/{id}', [DistribusiController::class, 'submitTujuan'])->name('distribusi.submit');
        Route::get('distribusi/edit/{id}', [DistribusiController::class, 'edit'])->name('distribusi.edit');
        Route::get('distribusi/detail/{id}', [DistribusiController::class, 'show'])->name('distribusi.show');
        Route::patch('distrusi/ajukan/{id}', [DistribusiController::class, 'ajukanTransaksi'])->name('distribusi.ask');

        //tujuan
        Route::delete('distribusi/tujuan/{id}', [DistribusiController::class, 'destroyTujuan'])->name('distribusi.tujuan.destroy');
        Route::post('distribusi/tujuan', [DistribusiController::class, 'storeTujuan'])->name('distribusi.tujuan.store');
        Route::patch('distribusi/tujuan/{id}', [DistribusiController::class, 'storeTujuan'])->name('distribusi.tujuan.update');
        Route::get('distribusi/tujuan/{id}', [DistribusiController::class, 'addTujuan'])->name('distribusi.tujuan.create');
    });

    Route::middleware('manajer')->group(function () {
        // manajer
        Route::get('distribusi/pengajuan', [DistribusiController::class, 'listPengajuan'])->name('manajer.index');
        Route::patch('distrusi/pengajuan/accepted/{id}', [DistribusiController::class, 'setujuiTransaksi'])->name('manajer.accepted');
        Route::get('distrusi/pengajuan/denied/{id}', [DistribusiController::class, 'formTolakTransaksi'])->name('manajer.denied');
        Route::patch('distrusi/pengajuan/denied/{id}', [DistribusiController::class, 'tolakTransaksi'])->name('manajer.deniedAction');
        Route::get('distribusi/laporan', [DistribusiController::class, 'laporan'])->name('laporan.index');
        Route::get('distribusi/laporan/cari', [DistribusiController::class, 'laporanAction'])->name('laporan.show');
    });

    Route::get('distribusi/jadwal', [DistribusiController::class, 'jadwalPengiriman'])->middleware('sopir')->name('sopir.index');
});
