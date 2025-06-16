<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\PaketMembership;

class RiwayatMembershipController extends Controller
{
    public function riwayatUser()
    {
        $user = auth()->user();

        $riwayat = Membership::with('paket')
            ->where('user_id', $user->id_pengguna)
            ->orderByDesc('created_at')
            ->get();

        return view('user.riwayat', compact('riwayat'));
    }
}
