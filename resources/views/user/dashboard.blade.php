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
                <p class="text-sm text-gray-600">Lihat status memberhsip kamu disini.</p>
            </a>
            <a href="{{ route('user.artikel') }}" class="bg-white shadow-md rounded-lg p-6 hover:bg-blue-50">
                <h3 class="text-lg font-bold">Artikel</h3>
                <p class="text-sm text-gray-600">Baca info seputar kesehatan dan gym.</p>
            </a>
        </div>
    </div>
</x-user>
