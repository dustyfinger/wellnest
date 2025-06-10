<x-app-layout>
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-800 text-white p-6">
            <h2 class="text-xl font-bold mb-4">WellNest</h2>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-gray-300">Overview</a></li>
                <li><a href="{{ route('admin.paket.index') }}" class="hover:text-gray-300">Paket Membership</a></li>
                <li><a href="#" class="hover:text-gray-300">Verifikasi Pembayaran</a></li>
                <li><a href="#" class="hover:text-gray-300">Artikel</a></li>
            </ul>
        </aside>

        {{-- Content --}}
        <div class="flex-1 bg-gray-100">
            {{-- Optional header slot dari Breeze --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Main content --}}
            <main class="p-6">
                @yield('content')
                <h2 class="text-xl font-semibold mb-4">Selamat Datang, {{ Auth::user()->nama }}</h2>
            </main>
        </div>
    </div>
</x-app-layout>
