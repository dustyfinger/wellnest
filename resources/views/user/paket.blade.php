<x-user>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        @foreach ($paket as $p)
            <div class="bg-white shadow-md p-6 rounded-xl">
                <h2 class="text-xl font-bold mb-2">{{ $p['nama'] }}</h2>
                <p>Durasi: {{ $p['durasi'] }}</p>
                <p class="text-green-600 font-semibold mt-2">Rp {{ number_format($p['harga'], 0, ',', '.') }}</p>
                <a href="{{ route('membership.form', ['paket_id' => $p->id]) }}" class="mt-4 inline-block bg-blue-600 text-black px-4 py-2 rounded-lg">Pilih Paket</a>
            </div>
        @endforeach
    </div>
</x-user>
