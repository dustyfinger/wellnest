<div>
    @extends('layouts.admin-app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Paket</h1>

    <form action="{{ route('admin.paket.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nama_paket" placeholder="Nama Paket" class="border p-2 w-full" required>

        <select name="durasi" class="border p-2 w-full" required>
            <option value="1 Bulan">1 Bulan</option>
            <option value="3 Bulan">3 Bulan</option>
            <option value="6 Bulan">6 Bulan</option>
            <option value="1 Tahun">1 Tahun</option>
        </select>

        <input type="number" name="harga" placeholder="Harga" class="border p-2 w-full" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection

</div>
