<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaketMembership;

class MembershipController extends Controller
{
    public function index()
    {
        $paket = PaketMembership::all();
        return view('user.paket', compact('paket'));
    }
}
