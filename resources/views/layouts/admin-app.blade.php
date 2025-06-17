<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin - WellNest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 h-screen bg-gray-800 text-white fixed">
            <div class="p-4 text-lg font-bold border-b border-gray-600">WellNest</div>
            <ul class="p-4 space-y-2">
                <li><a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">Overview</a></li>
                <li><a href="{{ route('admin.paket.index') }}" class="block hover:bg-gray-700 p-2 rounded">Paket Membership</a></li>
                <li><a href="{{ route('admin.membership.index') }}" class="block hover:bg-gray-700 p-2 rounded">Verifikasi Pembayaran</a></li>
                <li><a href="{{ route('admin.membership.riwayat') }}" class="block hover:bg-gray-700 p-2 rounded">Riwayat Membership</a></li>
                <li><a href="{{ route('edukasi.index') }}" class="block hover:bg-gray-700 p-2 rounded">Pengelolaan Artikel</a></li>
                <li><a href="{{ route('admin.laporan-keuangan') }}" class="block hover:bg-gray-700 p-2 rounded">Laporan Keuangan</a></li>
            </ul>
        </aside>

        {{-- Main content --}}
        <div class="flex-1 ml-64 min-h-screen">
            {{-- Navbar dari Breeze --}}
            <nav class="bg-white border-b shadow-sm px-6 py-4 flex justify-between items-center">
                <div class="text-xl font-bold text-gray-800">Admin Panel</div>
                <div class="flex items-center space-x-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.edit') }}">Profil</x-dropdown-link>
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Keluar
                            </x-dropdown-link>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                                @csrf
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </nav>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
