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

    public function riwayatAdmin()
    {
        $riwayat = Membership::with(['user', 'paket'])
            ->whereIn('status', ['Aktif', 'Ditolak'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.riwayat.index', compact('riwayat'));
    }

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
