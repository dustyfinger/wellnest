<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MembershipController as UserMembershipController;
use App\Http\Controllers\Admin\PaketMembershipController;
use App\Http\Controllers\Admin\AdminPaketController;


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
    Route::get('/membership/form', [UserMembershipController::class, 'form'])->name('membership.form');
    Route::post('/membership', [UserMembershipController::class, 'store'])->name('membership.store');
});

// Route Verifikasi pembelian membership untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/verifikasi-membership', [UserMembershipController::class, 'verifikasiIndex'])->name('admin.membership.index');
    Route::post('/admin/verifikasi-membership/{id}/{status}', [UserMembershipController::class, 'verifikasi'])->name('admin.membership.verifikasi');
});


require __DIR__.'/auth.php';
