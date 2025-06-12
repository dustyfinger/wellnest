<x-app-layout>
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 h-screen bg-gray-800 text-white fixed">
            <div class="p-4 text-lg font-bold border-b border-gray-600">
                WellNest
            </div>
            <ul class="p-4 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">Overview</a>
                </li>
                <li>
                    <a href="{{ url('/admin/verifikasi') }}" class="block hover:bg-gray-700 p-2 rounded">Verifikasi Pembayaran</a>
                </li>
                <li>
                    <a href="{{ url('/admin/artikel') }}" class="block hover:bg-gray-700 p-2 rounded">Artikel</a>
                </li>
            </ul>
        </aside>

        {{-- Konten utama --}}
        <div class="ml-64 flex-1 bg-gray-100">
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>
