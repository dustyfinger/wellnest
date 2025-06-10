<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MembershipController;
// use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\Admin\PaketMembershipController;


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
Route::get('/membership', [MembershipController::class, 'index'])->middleware('auth')->name('membership.index');
Route::post('/membership', [MembershipController::class, 'store'])->middleware('auth')->name('membership.store');

// Untuk Admin
Route::get('/admin/verifikasi', [VerifikasiController::class, 'index'])->middleware('auth')->name('admin.verifikasi');
Route::post('/admin/verifikasi/terima/{id}', [VerifikasiController::class, 'terima'])->middleware('auth')->name('admin.verifikasi.terima');
Route::post('/admin/verifikasi/tolak/{id}', [VerifikasiController::class, 'tolak'])->middleware('auth')->name('admin.verifikasi.tolak');

Route::get('/user/paket', [MembershipController::class, 'index'])->middleware('auth')->name('user.paket');
Route::get('/user/membership', [MembershipController::class, 'create'])->name('user.pembayaran');
Route::get('/user/artikel', [ArtikelController::class, 'index'])->name('user.artikel');


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('paket', PaketMembershipController::class);
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('paket', App\Http\Controllers\Admin\AdminPaketController::class);
});


Route::get('/paket', [MembershipController::class, 'index'])->name('user.paket.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/membership/form', [MembershipController::class, 'form'])->name('membership.form');
    Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');
});


require __DIR__.'/auth.php';
