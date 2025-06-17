<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Membership;
use App\Models\Paket;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Data ringkasan untuk admin
            $totalMember = User::where('role', 'user')->count();
            $activeMembershipUser = Membership::where('status', 'Aktif')
                ->where('tanggal_berakhir', '>', now())
                ->distinct('user_id')
                ->count('user_id');
            $pendingMembership = Membership::where('status', 'Menunggu')->count();
            $totalIncome = Membership::where('status', 'Aktif')
                ->whereNotNull('jumlah')
                ->sum('jumlah');

            return view('admin.dashboard', compact(
                'totalMember',
                'activeMembershipUser',
                'pendingMembership',
                'totalIncome'
            ));
        } elseif ($user->role === 'user') {
            // Data untuk user (bisa ditambah sesuai kebutuhan)
            return view('user.dashboard');
        }

        abort(403, 'Akses ditolak.');
    }
}
