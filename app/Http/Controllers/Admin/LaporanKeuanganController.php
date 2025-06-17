<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi membership yang sudah aktif (berhasil)
        $transaksi = Membership::with(['user', 'paket'])
            ->where('status', 'Aktif')
            ->orderBy('created_at', 'desc')
            ->get();

        // Total pemasukan dari membership aktif
        $totalIncome = $transaksi->sum('jumlah');

        // Total transaksi berhasil
        $totalTransaksi = $transaksi->count();

        // Periode (bisa diubah sesuai kebutuhan, misal bulan ini)
        $periode = 'Semua Waktu';

        return view('admin.laporan-keuangan', compact(
            'transaksi',
            'totalIncome',
            'totalTransaksi',
            'periode'
        ));
    }
}
