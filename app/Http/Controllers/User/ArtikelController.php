<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('user.artikel.index', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        $konten = null;

        if ($artikel->file_path && Storage::disk('public')->exists($artikel->file_path)) {
            $konten = Storage::disk('public')->get($artikel->file_path);
        }

        return view('user.artikel.show', compact('artikel', 'konten'));
    }
}
