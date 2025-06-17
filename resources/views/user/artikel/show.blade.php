<x-user>
    <h2 class="text-2xl font-bold mb-2">{{ $artikel->judul }}</h2>

    @if($konten)
        <div class="bg-gray-100 p-4 rounded whitespace-pre-line">
            {{ $konten }}
        </div>
    @else
        <p class="text-gray-500">File tidak tersedia atau gagal dibaca.</p>
    @endif

    <br>

    <a href="{{ route('user.artikel.index') }}" class="text-blue-600 mt-4 inline-block">
        Kembali ke daftar artikel
    </a>
</x-user>
