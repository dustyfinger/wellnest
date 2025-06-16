<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\PaketMembership;

class VerifikasiMembershipController extends Controller
{
    //untuk nampilkan data pembayaran yang belum diverifikasi
    public function verifikasiIndex()
    {
        $memberships = Membership::with(['user', 'paket'])->where('status', 'Menunggu')->get();
        return view('admin.verifikasi-membership', compact('memberships'));
    }

    public function verifikasi($id, $status)
    {
        $membership = Membership::findOrFail($id);
        $membership->status = $status;

        if ($status === 'Aktif' && $membership->paket) {
            $membership->tanggal_aktif = now();
            $membership->tanggal_berakhir = now()->addDays($membership->paket->lama_dalam_hari); // pastikan relasi paket ada
        }

        $membership->save();

        return redirect()->route('admin.membership.index')->with('success', 'Status berhasil diperbarui.');
    }
}
