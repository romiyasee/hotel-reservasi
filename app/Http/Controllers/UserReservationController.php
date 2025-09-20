<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class UserReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
        ]);



        Reservation::create([
            'user_id' => auth()->user()->id, // pastikan integer
            'kamar_id' => $request->kamar_id,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'status' => 'pending',
        ]);


        return redirect()->back()->with('success', 'Reservasi berhasil dibuat!');
    }
}
