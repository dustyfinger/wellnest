<x-user>
    <h2 class="text-2xl font-bold mb-2">{{ $artikel->judul }}</h2>

    @if($artikel->file_path)
        <a href="{{ asset('storage/' . $artikel->file_path) }}" target="_blank" class="text-green-600 underline">
            Lihat/Download File
        </a>
    @else
        <p class="text-gray-500">File tidak tersedia.</p>
    @endif

    <br>

    <a href="{{ route('user.artikel.index') }}" class="text-blue-600 mt-4 inline-block">
        Kembali ke daftar artikel
    </a>
</x-user>
