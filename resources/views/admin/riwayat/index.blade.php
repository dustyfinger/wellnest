@extends('layouts.app')

@section('title', 'Riwayat Membership')

@section('content')
<div class="max-w-5xl mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Riwayat Membership</h2>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Nama User</th>
                <th class="p-2 border">Paket</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Tanggal Aktif</th>
                <th class="p-2 border">Tanggal Berakhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayat as $m)
                <tr class="border-t">
                    <td class="p-2 border">{{ $m->user->nama }}</td>
                    <td class="p-2 border">{{ $m->paket->nama_paket }}</td>
                    <td class="p-2 border">{{ $m->status }}</td>
                    <td class="p-2 border">{{ $m->tanggal_aktif ?? '-' }}</td>
                    <td class="p-2 border">{{ $m->tanggal_berakhir ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">Tidak ada riwayat membership.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
