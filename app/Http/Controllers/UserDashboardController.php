<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;  

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua kamar
        $rooms = Room::all();

        // Ambil reservasi user yang sedang login
        $reservations = auth()->user()->reservations()->with('room')->get();

        // Kirim data ke view dashboard.blade.php
        return view('dashboard', compact('rooms', 'reservations'));
    }
}
