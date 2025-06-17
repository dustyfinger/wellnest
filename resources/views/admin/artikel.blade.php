@extends('layouts.admin-app')

@section('content')
<section x-data="edukasiModal" class="pt-24 px-6">
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <button @click="showForm = true; editMode = false; formData = { id: '', judul: '' }"
            class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg shadow">
            Tambah Artikel
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($data as $item)
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">{{ $item->judul }}</h3>
            {{-- <a href="{{ asset('storage/' . $item->file_path) }}" class="text-blue-600 underline" target="_blank">Lihat Konten</a> --}}
            <button @click="lihatKonten('{{ asset('storage/' . $item->file_path) }}')" class="text-blue-600 underline">
                Lihat Konten
            </button>

            <div class="mt-4 flex justify-between">
                <button @click="editArtikel({ id: '{{ $item->id }}', judul: '{{ $item->judul }}'})"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</button>

                <form action="{{ route('edukasi.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div x-show="showForm" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div @click.outside="showForm = false" class="bg-white p-6 rounded-lg w-full max-w-xl">
            <h2 class="text-xl font-bold mb-4" x-text="editMode ? 'Edit Artikel' : 'Tambah Artikel'"></h2>

            <form :action="editMode ? '/edukasi/' + formData.id : '{{ route('edukasi.simpan') }}'" method="POST" enctype="multipart/form-data">
                @csrf
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="mb-3">
                    <label class="block font-medium">Judul</label>
                    <input type="text" name="judul" x-model="formData.judul" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-3">
                    <label class="block font-medium">File Konten</label>
                    <input type="file" name="file" class="w-full border px-3 py-2">
                </div>

                <div class="flex justify-end">
                    <button type="button" @click="showForm = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Lihat Konten -->
    <div x-show="showKonten" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div @click.outside="showKonten = false" class="bg-white p-6 rounded-lg w-full max-w-2xl max-h-[80vh] overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Konten Artikel</h2>
            <pre class="whitespace-pre-wrap text-gray-800" x-text="kontenArtikel"></pre>
            <div class="mt-4 text-right">
                <button @click="showKonten = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('edukasiModal', () => ({
            showForm: false,
            editMode: false,
            showKonten: false,
            formData: {
                id: '',
                judul: ''
            },
            editArtikel(data) {
                this.editMode = true;
                this.showForm = true;
                this.formData.id = data.id;
                this.formData.judul = data.judul;
            },
            async lihatKonten(fileUrl) {
                const res = await fetch(fileUrl);
                this.kontenArtikel = await res.text();
                this.showKonten = true;
            }
        }))
    })
</script>
@endpush
