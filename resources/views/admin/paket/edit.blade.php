<div>
    @extends('layouts.admin-app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit Paket</h1>

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="nama_paket" value="{{ $paket->nama_paket }}" class="border p-2 w-full" required>

        <select name="durasi" class="border p-2 w-full" required>
            <option value="1 Bulan" {{ $paket->durasi == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
            <option value="3 Bulan" {{ $paket->durasi == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
            <option value="6 Bulan" {{ $paket->durasi == '6 Bulan' ? 'selected' : '' }}>6 Bulan</option>
            <option value="1 Tahun" {{ $paket->durasi == '1 Tahun' ? 'selected' : '' }}>1 Tahun</option>
        </select>

        <input type="number" name="harga" value="{{ $paket->harga }}" class="border p-2 w-full" required>
        <textarea name="deskripsi" class="border p-2 w-full" rows="4" placeholder="Deskripsi">{{ $paket->deskripsi }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection

</div>
