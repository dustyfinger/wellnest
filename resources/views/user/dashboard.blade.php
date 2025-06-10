<x-user>
    <div class="py-6 max-w-7xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">Selamat Datang, {{ Auth::user()->nama }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card fitur -->
            <a href="{{ route('user.paket') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-blue-50">
                <h3 class="text-lg font-bold">Paket Membership</h3>
                <p class="text-sm text-gray-600">Lihat dan pilih paket sesuai kebutuhanmu.</p>
            </a>
            <a href="{{ route('user.pembayaran') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-blue-50">
                <h3 class="text-lg font-bold">Pembayaran</h3>
                <p class="text-sm text-gray-600">Unggah bukti pembayaran untuk aktivasi.</p>
            </a>
            <a href="{{ route('user.artikel') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-blue-50">
                <h3 class="text-lg font-bold">Artikel</h3>
                <p class="text-sm text-gray-600">Baca info seputar kesehatan dan gym.</p>
            </a>
        </div>
    </div>
</x-user>


{{-- <x-user>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            Selamat Datang, {{ Auth::user()->nama }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
            <!-- Card: Paket Membership -->
            <a href="{{ route('user.paket') }}"
               class="bg-white shadow-md rounded-2xl p-6 hover:bg-blue-50 transition duration-300 min-h-[150px] flex flex-col justify-between">
                <h3 class="text-lg font-bold text-gray-800">Paket Membership</h3>
                <p class="mt-2 text-sm text-gray-600">Lihat dan pilih paket sesuai kebutuhanmu.</p>
            </a>

            <!-- Card: Pembayaran -->
            <a href="{{ route('user.pembayaran') }}"
               class="bg-white shadow-md rounded-2xl p-6 hover:bg-blue-50 transition duration-300 min-h-[150px] flex flex-col justify-between">
                <h3 class="text-lg font-bold text-gray-800">Pembayaran</h3>
                <p class="mt-2 text-sm text-gray-600">Unggah bukti pembayaran untuk aktivasi.</p>
            </a>

            <!-- Card: Artikel -->
            <a href="{{ route('user.artikel') }}"
               class="bg-white shadow-md rounded-2xl p-6 hover:bg-blue-50 transition duration-300 min-h-[150px] flex flex-col justify-between">
                <h3 class="text-lg font-bold text-gray-800">Artikel</h3>
                <p class="mt-2 text-sm text-gray-600">Baca info seputar kesehatan dan gym.</p>
            </a>
        </div>
    </div>
</x-user> --}}
