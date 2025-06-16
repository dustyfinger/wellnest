<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketMembership;

class UserPaketController extends Controller
{
    // untuk menampilkan paket membership
    public function index()
    {
        $paket = PaketMembership::all();
        return view('user.paket', compact('paket'));
    }
}
