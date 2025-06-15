<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::latest()->get();
        return view('admin.artikel', compact('data'));
    }

    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('edukasi/konten', 'public');

        Artikel::create([
            'judul' => $validated['judul'],
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($artikel->file_path);
            $artikel->file_path = $request->file('file')->store('edukasi/konten', 'public');
        }

        $artikel->judul = $validated['judul'];
        $artikel->save();

        return redirect()->back()->with('success', 'Artikel berhasil diperbarui.');
    }

    public function hapus($id)
    {
        $artikel = Artikel::findOrFail($id);
        Storage::disk('public')->delete($artikel->file_path);
        $artikel->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }
}
