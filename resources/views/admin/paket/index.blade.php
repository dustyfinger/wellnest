@extends('layouts.admin-app')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Paket Membership</h1>
            <a href="{{ route('admin.paket.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Paket
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Nama Paket</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Durasi</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Harga</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Deskripsi</th>
                        <th class="text-center py-3 px-4 font-semibold text-gray-700" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pakets as $paket)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $paket->nama_paket }}</td>
                            <td class="py-3 px-4 text-gray-700">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $paket->durasi }}
                                </span>
                            </td>
                            <td class="py-3 px-4 font-semibold text-green-600">
                                Rp {{ number_format($paket->harga, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 text-gray-700 max-w-xs truncate">
                                {{ $paket->deskripsi }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.paket.edit', $paket->id) }}"
                                   class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 transition-colors duration-200 bg-transparent border-none cursor-pointer">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
