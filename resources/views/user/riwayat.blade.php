<x-user>
    <div class="max-w-4xl mx-auto p-4 bg-white rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Riwayat Pembayaran Membership</h2>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Paket</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Tanggal Aktif</th>
                    <th class="border px-4 py-2">Tanggal Berakhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $m)
                    <tr>
                        <td class="border px-4 py-2">{{ $m->paket->nama_paket }}</td>
                        <td class="border px-4 py-2">{{ $m->status }}</td>
                        <td class="border px-4 py-2">{{ $m->tanggal_aktif ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $m->tanggal_berakhir ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada riwayat membership.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-user>
