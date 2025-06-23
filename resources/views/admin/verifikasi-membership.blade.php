@extends('layouts.admin-app')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Verifikasi Pembayaran</h2>
            <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Total: {{ count($memberships) }} pembayaran menunggu verifikasi
            </div>
        </div>

        @forelse ($memberships as $membership)
            <div class="border border-gray-200 rounded-lg mb-6 overflow-hidden hover:shadow-md transition-shadow duration-200">
                <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-gray-800">
                            Pembayaran
                        </h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Menunggu Verifikasi
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Info Pembayaran -->
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-600">Nama User</label>
                                <p class="text-gray-900 font-medium">{{ $membership->user->nama }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600">Paket Membership</label>
                                <p class="text-gray-900 font-medium">{{ $membership->paket->nama_paket }}</p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600">Harga Paket</label>
                                <p class="text-green-600 font-bold text-lg">
                                    Rp {{ number_format($membership->paket->harga, 0, ',', '.') }}
                                </p>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600">Tanggal Upload</label>
                                <p class="text-gray-900">{{ $membership->created_at->format('d M Y, H:i') }} WIB</p>
                            </div>
                        </div>

                        <!-- Bukti Transfer -->
                        <div>
                            <label class="text-sm font-medium text-gray-600 block mb-2">Bukti Transfer</label>
                            <img src="{{ asset('storage/' . $membership->bukti_transfer) }}"
                                 alt="Bukti Transfer"
                                 class="w-64 h-auto rounded-lg border border-gray-200 shadow-sm">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3 mt-6 pt-4 border-t border-gray-200">
                        <form action="{{ route('admin.membership.verifikasi', ['id' => $membership->id, 'status' => 'Ditolak']) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menolak pembayaran ini?')">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Tolak
                            </button>
                        </form>

                        <form action="{{ route('admin.membership.verifikasi', ['id' => $membership->id, 'status' => 'Aktif']) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menerima pembayaran ini?')">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Terima
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada pembayaran</h3>
                <p class="text-gray-600">Tidak ada pembayaran yang perlu diverifikasi saat ini.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
