<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaketMembership;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function form($paket_id = null)
    {
        $user = auth()->user();

        $latestMembership = Membership::where('user_id', $user->id)->latest()->first();

        if ($latestMembership) {
            if ($latestMembership->status === 'Menunggu') {
                return redirect()->route('dashboard')->with('error', 'Pembayaranmu sedang diverifikasi.');
            }

            if ($latestMembership->status === 'Aktif' && now()->lessThan($latestMembership->tanggal_berakhir)) {
                return redirect()->route('dashboard')->with('error', 'Membership kamu masih aktif.');
            }
    }

        $paketMembership = PaketMembership::all();
        $selectedPaket = $paket_id ? PaketMembership::find($paket_id) : null;

        return view('user.membership', compact('paketMembership'));
    }

    public function store(Request $request)
    {
        // NGECEK apakah user ada apa nggak
        // kasih status nya mis:pending

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
