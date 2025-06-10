@extends('layouts.app')

@section('title', 'Membership')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Pilih Paket Membership</h2>

    <form action="{{ route('membership.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="paket_id" class="block text-sm font-medium text-gray-700">Paket Membership</label>
            <select name="paket_id" id="paket_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @foreach ($paketMembership as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }} - Rp{{ number_format($paket->harga) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="bukti_transfer" class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_transfer" id="bukti_transfer" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim Bukti
        </button>
    </form>
</div>
@endsection
