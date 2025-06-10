<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaketMembership;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $paket = PaketMembership::all();
        return view('user.paket', compact('paket'));
    }

    public function form()
    {
        $paketMembership = PaketMembership::all();
        return view('user.membership', compact('paketMembership'));
    }

    public function store(Request $request)
    {

        \Log::debug('MASUK STORE MEMBERSHIP');
        \Log::debug($request->all());
        \Log::debug('USER:');
        \Log::debug(auth()->user());

        $request->validate([
            'paket_id' => 'required|exists:paket_membership,id',
            'bukti_transfer' => 'required|file|max:2048',
        ]);

        $paket = PaketMembership::findOrFail($request->paket_id);
        $buktiPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        try{
        Membership::create([
            'user_id' => auth()->user()->id_pengguna,
            'paket_id' => $paket->id,
            'bukti_transfer' => $buktiPath,
            'jumlah' => $paket->harga,
            'status' => 'Menunggu',
            'tanggal_aktif' => null,
            'tanggal_berakhir' => null,
        ]);
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan membership: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Terjadi kesalahan saat menyimpan.']);
        }

        return redirect()->route('membership.form')->with('success', 'Bukti pembayaran berhasil dikirim!');
    }

}
