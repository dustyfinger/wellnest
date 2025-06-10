<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
        public function index()
    {
        // Contoh data paket membership
        $paket = [
            ['nama' => 'Basic', 'durasi' => '1 Bulan', 'harga' => 100000],
            ['nama' => 'Pro', 'durasi' => '3 Bulan', 'harga' => 270000],
            ['nama' => 'Elite', 'durasi' => '1 Tahun', 'harga' => 1000000],
        ];

        return view('user.paket', compact('paket'));
    }
}
