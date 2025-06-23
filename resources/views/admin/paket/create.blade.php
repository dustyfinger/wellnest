@extends('layouts.admin-app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center mb-6">
                <a href="{{ route('admin.paket.index') }}"
                   class="mr-4 text-gray-600 hover:text-gray-800 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-800">Tambah Paket</h1>
            </div>

            <form action="{{ route('admin.paket.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nama_paket" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="nama_paket"
                           name="nama_paket"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                           placeholder="Masukkan nama paket"
                           required>
                </div>

                <div>
                    <label for="durasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Durasi <span class="text-red-500">*</span>
                    </label>
                    <select name="durasi"
                            id="durasi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            required>
                        <option value="">Pilih durasi</option>
                        <option value="1 Bulan">1 Bulan</option>
                        <option value="3 Bulan">3 Bulan</option>
                        <option value="6 Bulan">6 Bulan</option>
                        <option value="1 Tahun">1 Tahun</option>
                    </select>
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                        <input type="number"
                               id="harga"
                               name="harga"
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                               placeholder="0"
                               min="0"
                               required>
                    </div>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi"
                              id="deskripsi"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-vertical"
                              rows="4"
                              placeholder="Masukkan deskripsi paket (opsional)"></textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.paket.index') }}"
                       class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Simpan Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
