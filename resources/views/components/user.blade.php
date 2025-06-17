<x-guest-layout>
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">WellNest</div>
            <div class="flex items-center space-x-4">
                <x-nav-link href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
                    Beranda
                </x-nav-link>
                <x-nav-link href="{{ route('user.paket') }}" :active="request()->routeIs('user.paket')">
                    Paket Membership
                </x-nav-link>
                <x-nav-link href="{{ route('user.pembayaran') }}" :active="request()->routeIs('user.paket')">
                    Membership
                </x-nav-link>
                <x-nav-link href="{{ route('user.artikel.index') }}" :active="request()->routeIs('user.artikel')">
                    Artikel
                </x-nav-link>

                <!-- Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor"><path d="M6 9l6 6 6-6" /></svg>
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
        </div>
    </nav>

    <!-- Slot isi konten -->
    <main class="px-4 py-4">
        {{ $slot }}
    </main>
</x-guest-layout>


{{-- ========= YANG BAWAH YG LAMA +++++++++++  --}}

{{-- <x-guest-layout>
    <nav class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">WellNest</div>
            <div class="flex items-center space-x-6">
                <x-nav-link href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')">
                    Beranda
                </x-nav-link>
                <x-nav-link href="{{ route('user.paket') }}" :active="request()->routeIs('user.paket')">
                    Membership
                </x-nav-link>
                <x-nav-link href="{{ route('user.artikel') }}" :active="request()->routeIs('user.artikel')">
                    Artikel
                </x-nav-link>

                <!-- Dropdown -->
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
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            Profil
                        </x-dropdown-link>
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
        </div>
    </nav>

    <main class="px-4 py-8">
        {{ $slot }}
    </main>
</x-guest-layout> --}}
