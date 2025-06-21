<div>
    @extends('layouts.admin-app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Daftar Paket Membership</h1>
    <a href="{{ route('admin.paket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Paket</a>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th>Nama Paket</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakets as $paket)
                <tr>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>{{ $paket->durasi }}</td>
                    <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                    <td>{{ $paket->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.paket.edit', $paket->id) }}" class="text-blue-600">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 bg-transparent border-none p-0 m-0 cursor-pointer">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</div>
