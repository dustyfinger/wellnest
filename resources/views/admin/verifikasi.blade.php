@extends('layouts.app')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Verifikasi Pembayaran</h2>

    @forelse ($pembayaranPending as $pembayaran)
        <div class="border p-4 mb-4 rounded shadow-sm">
            <p><strong>Nama User:</strong> {{ $pembayaran->user->nama }}</p>
            <p><strong>Paket:</strong> {{ $pembayaran->paket->nama_paket }}</p>
            <p><strong>Tanggal Upload:</strong> {{ $pembayaran->tanggal_upload }}</p>
            <p class="mb-2">
                <strong>Bukti:</strong><br>
                <img src="{{ asset('storage/' . $pembayaran->bukti_transfer) }}" alt="Bukti" class="w-64 rounded">
            </p>

            <form action="{{ route('admin.verifikasi.terima', $pembayaran->id) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                    Terima
                </button>
            </form>

            <form action="{{ route('admin.verifikasi.tolak', $pembayaran->id) }}" method="POST" class="inline ml-2">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                    Tolak
                </button>
            </form>
        </div>
    @empty
        <p class="text-gray-600">Tidak ada pembayaran yang perlu diverifikasi.</p>
    @endforelse
</div>
@endsection
