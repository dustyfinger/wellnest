<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketMembership;
use App\Models\Membership;

class AdminPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = \App\Models\PaketMembership::all();
        return view('admin.paket.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_paket' => 'required|string|max:255',
        'durasi' => 'required|string',
        'harga' => 'required|integer',
        'deskripsi' => 'nullable|string|max:1000',
    ]);

        $lama_hari = match ($request->durasi) {
        '1 Bulan' => 30,
        '3 Bulan' => 90,
        '6 Bulan' => 180,
        '1 Tahun' => 365,
        default => 0
    };

    PaketMembership::create([
        'nama_paket' => $request->nama_paket,
        'durasi' => $request->durasi,
        'lama_dalam_hari' => $lama_hari,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
    ]);

        return redirect()->route('admin.paket.index')->with('success', 'Paket membership berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = \App\Models\PaketMembership::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'durasi' => 'required|string',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $lama_hari = match ($request->durasi) {
            '1 Bulan' => 30,
            '3 Bulan' => 90,
            '6 Bulan' => 180,
            '1 Tahun' => 365,
            default => 0
        };

        $paket = \App\Models\PaketMembership::findOrFail($id);
        $paket->update([
            'nama_paket' => $request->nama_paket,
            'durasi' => $request->durasi,
            'lama_dalam_hari' => $lama_hari,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.paket.index')->with('success', 'Paket membership berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = \App\Models\PaketMembership::findOrFail($id);

        $adaAktif = \App\Models\Membership::where('paket_id', $paket->id)
            ->where('status', 'Aktif')
            ->exists();

        if ($adaAktif) {
            return redirect()->route('admin.paket.index')
            ->with('error', 'Paket tidak dapat dihapus karena sedang digunakan oleh membership aktif.');
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket membership berhasil dihapus.');
    }
}
