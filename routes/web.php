<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MembershipController as UserMembershipController;
use App\Http\Controllers\Admin\PaketMembershipController;
use App\Http\Controllers\Admin\AdminPaketController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;


Route::get('/', function () {
    return view('V_Home');
});


Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return view('admin.dashboard');
    } elseif ($user->role === 'user') {
        return view('user.dashboard');
    }

    abort(403, 'Akses ditolak.');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Untuk User
Route::get('/membership', [UserMembershipController::class, 'index'])->middleware('auth')->name('membership.index');
Route::post('/membership', [UserMembershipController::class, 'store'])->middleware('auth')->name('membership.store');

Route::get('/user/paket', [UserMembershipController::class, 'index'])->middleware('auth')->name('user.paket');
Route::get('/user/membership', [UserMembershipController::class, 'create'])->name('user.pembayaran'); //method ini gaada tapi kalo di akses bakal error
Route::get('/user/artikel', [ArtikelController::class, 'index'])->name('user.artikel'); // ini harus dilanjutin nanti pas ngerjakan artikel, kalau di komen nanti error juga


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Buat pengelolaan paket membership admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('paket', AdminPaketController::class);
});

// Menampilkan daftar paket membership di user
Route::get('/paket', [UserMembershipController::class, 'index'])->name('user.paket.index');

// Nampilkan form upload bukti transfer & menyimpan data membership
Route::middleware(['auth'])->group(function () {
    Route::get('/membership/form/{paket_id?}', [UserMembershipController::class, 'form'])->name('membership.form');
    Route::post('/membership', [UserMembershipController::class, 'store'])->name('membership.store');
});

// Route Verifikasi pembelian membership untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/verifikasi-membership', [UserMembershipController::class, 'verifikasiIndex'])->name('admin.membership.index');
    Route::post('/admin/verifikasi-membership/{id}/{status}', [UserMembershipController::class, 'verifikasi'])->name('admin.membership.verifikasi');
});

// Route buat nampilin riwayat
Route::get('/admin/riwayat-membership', [UserMembershipController::class, 'riwayatAdmin'])->name('admin.membership.riwayat')->middleware('auth');

// Route untuk nampilin histori pembayaran membership user
Route::get('/user/pembayaran', [UserMembershipController::class, 'riwayatUser'])->middleware('auth')->name('user.pembayaran');

//route untuk artikel
Route::prefix('edukasi')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminArtikelController::class, 'index'])->name('edukasi.index');
    Route::post('/simpan', [AdminArtikelController::class, 'simpan'])->name('edukasi.simpan');
    Route::put('/{id}', [AdminArtikelController::class, 'update'])->name('edukasi.update');
    Route::delete('/{id}', [AdminArtikelController::class, 'hapus'])->name('edukasi.hapus');
});


require __DIR__.'/auth.php';
