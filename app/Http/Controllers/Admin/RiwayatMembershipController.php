<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\PaketMembership;

class RiwayatMembershipController extends Controller
{
    public function riwayatAdmin()
    {
        $riwayat = Membership::with(['user', 'paket'])
            ->whereIn('status', ['Aktif', 'Ditolak'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.riwayat.index', compact('riwayat'));
    }
}
