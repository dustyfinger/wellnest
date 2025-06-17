<x-user>
    <h2 class="text-2xl font-bold mb-4">Daftar Artikel</h2>
    <ul>
        @foreach($artikels as $artikel)
            <li class="mb-2">
                <a href="{{ route('user.artikel.show', $artikel->id) }}" class="text-blue-600">{{ $artikel->judul }}</a>
            </li>
        @endforeach
    </ul>
    {{ $artikels->links() }}
</x-user>
