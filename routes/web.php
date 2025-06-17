<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MembershipController as UserMembershipController;
use App\Http\Controllers\User\UserPaketController;
use App\Http\Controllers\User\RiwayatMembershipController as UserRiwayatMembershipController;
use App\Http\Controllers\User\ArtikelController as UserArtikelController;
use App\Http\Controllers\Admin\PaketMembershipController;
use App\Http\Controllers\Admin\AdminPaketController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\VerifikasiMembershipController;
use App\Http\Controllers\Admin\RiwayatMembershipController as AdminRiwayatMembershipController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LaporanKeuanganController;

// Landing Page
Route::get('/', function () {
    return view('V_Home');
});

// Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Untuk User
// handling pembayaran
Route::get('/membership', [UserMembershipController::class, 'index'])->middleware('auth')->name('membership.index');
Route::post('/membership', [UserMembershipController::class, 'store'])->middleware('auth')->name('membership.store');
// handling menampilkan Paket Membership
Route::get('/user/paket', [UserPaketController::class, 'index'])->middleware('auth')->name('user.paket');
Route::get('/user/membership', [UserMembershipController::class, 'create'])->name('user.pembayaran'); //method ini gaada tapi kalo di akses bakal error
Route::get('/user/artikel', [ArtikelController::class, 'index'])->name('user.artikel'); // ini harus dilanjutin nanti pas ngerjakan artikel, kalau di komen nanti error juga


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Buat pengelolaan paket membership admin
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('paket', AdminPaketController::class);
});

// Menampilkan daftar paket membership di user
Route::get('/paket', [UserPaketController::class, 'index'])->name('user.paket.index');

// Nampilkan form upload bukti transfer & menyimpan data membership
Route::middleware(['auth','user'])->group(function () {
    Route::get('/membership/form/{paket_id?}', [UserMembershipController::class, 'form'])->name('membership.form');
    Route::post('/membership', [UserMembershipController::class, 'store'])->name('membership.store');
});

// Route Verifikasi pembelian membership untuk admin
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/verifikasi-membership', [VerifikasiMembershipController::class, 'verifikasiIndex'])->name('admin.membership.index');
    Route::post('/admin/verifikasi-membership/{id}/{status}', [VerifikasiMembershipController::class, 'verifikasi'])->name('admin.membership.verifikasi');
});

// Route buat nampilin riwayat
Route::get('/admin/riwayat-membership', [AdminRiwayatMembershipController::class, 'riwayatAdmin'])->name('admin.membership.riwayat')->middleware('auth');

// Klik pembayaran di user => Route untuk nampilin status pembayaran membership user
Route::get('/user/pembayaran', [UserRiwayatMembershipController::class, 'riwayatUser'])->middleware('auth')->name('user.pembayaran');

//route untuk artikel
Route::prefix('edukasi')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminArtikelController::class, 'index'])->name('edukasi.index');
    Route::post('/simpan', [AdminArtikelController::class, 'simpan'])->name('edukasi.simpan');
    Route::put('/{id}', [AdminArtikelController::class, 'update'])->name('edukasi.update');
    Route::delete('/{id}', [AdminArtikelController::class, 'hapus'])->name('edukasi.hapus');
});

//route untuk artikel user
Route::get('/artikel', [UserArtikelController::class, 'index'])->name('user.artikel.index');
Route::get('/artikel/{id}', [UserArtikelController::class, 'show'])->name('user.artikel.show');

//route laporan keuangan
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('admin.laporan-keuangan');
});

require __DIR__.'/auth.php';
