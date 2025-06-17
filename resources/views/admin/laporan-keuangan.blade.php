@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Laporan Keuangan Membership</h2>

    <div class="bg-white rounded shadow p-6 mb-8">
        <h3 class="text-lg font-semibold mb-4">Ringkasan</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-green-50 rounded">
                <p class="text-gray-600">Total Pemasukan</p>
                <p class="text-2xl font-bold text-green-700">Rp{{ number_format($totalIncome ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="p-4 bg-blue-50 rounded">
                <p class="text-gray-600">Transaksi Berhasil</p>
                <p class="text-2xl font-bold text-blue-700">{{ $totalTransaksi ?? 0 }}</p>
            </div>
            <div class="p-4 bg-yellow-50 rounded">
                <p class="text-gray-600">Periode</p>
                <p class="text-lg font-semibold text-yellow-700">{{ $periode ?? 'Semua Waktu' }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Detail Transaksi Membership</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full border">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Nama Pengguna</th>
                        <th class="px-4 py-2 border">Paket</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksi as $item)
                        <tr>
                            <td class="px-4 py-2 border">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">{{ $item->user->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $item->paket->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 border">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
