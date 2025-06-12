<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaketMembership;
use App\Models\Membership;

class MembershipController extends Controller
{
    // untuk menampilkan paket membership
    public function index()
    {
        $paket = PaketMembership::all();
        return view('user.paket', compact('paket'));
    }

    // form pembayaran (upload bukti transfer)
    public function form()
    {
        $paketMembership = PaketMembership::all();
        return view('user.membership', compact('paketMembership'));
    }

    public function store(Request $request)
    {
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
