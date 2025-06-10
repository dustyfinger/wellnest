<div class="w-64 h-screen bg-gray-800 text-white fixed">
    <div class="p-4 text-lg font-bold border-b border-gray-600">
        WellNest
    </div>
    <ul class="p-4 space-y-2">
        <li>
            <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">
                Overview
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/verifikasi') }}" class="block hover:bg-gray-700 p-2 rounded">
                Verifikasi Pembayaran
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/artikel') }}" class="block hover:bg-gray-700 p-2 rounded">
                Artikel
            </a>
        </li>
        {{-- Tambahkan menu lainnya jika perlu --}}
    </ul>
</div>
