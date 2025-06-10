<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
