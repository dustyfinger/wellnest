<x-user>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        @foreach ($paket as $p)
            <div class="bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 rounded-2xl border border-gray-100">
                <div class="flex flex-col h-full">
                    <div class="flex-grow">
                        <h2 class="text-lg font-bold text-gray-800 mb-3">{{ $p['nama_paket'] }}</h2>
                        @if($p->deskripsi)
                            <p class="text-sm text-gray-700 mb-4">{{ $p->deskripsi }}</p>
                        @endif
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Durasi: {{ $p['durasi'] }}
                            </p>
                        </div>
                        <div class="mb-6">
                            <p class="text-xl font-bold text-green-600">
                                Rp {{ number_format($p['harga'], 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <a href="{{ route('membership.form', ['paket_id' => $p->id]) }}"
                           class="w-full inline-block text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium px-4 py-2 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-sm">
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-user>
