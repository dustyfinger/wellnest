@extends('layouts.app')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Verifikasi Pembayaran</h2>

    @forelse ($memberships as $membership)
        <div class="border p-4 mb-4 rounded shadow-sm">
            <p><strong>Nama User:</strong> {{ $membership->user->nama }}</p>
            <p><strong>Paket:</strong> {{ $membership->paket->nama_paket }}</p>
            <p><strong>Tanggal Upload:</strong> {{ $membership->created_at->format('d-m-Y H:i') }}</p>
            <p class="mb-2">
                <strong>Bukti Transfer:</strong><br>
                <img src="{{ asset('storage/' . $membership->bukti_transfer) }}" alt="Bukti" class="w-64 rounded">
            </p>

            <form action="{{ route('admin.membership.verifikasi', ['id' => $membership->id, 'status' => 'Aktif']) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                    Terima
                </button>
            </form>

            <form action="{{ route('admin.membership.verifikasi', ['id' => $membership->id, 'status' => 'Ditolak']) }}" method="POST" class="inline ml-2">
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
