<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        return view('admin');
    }

    // Kelola User
    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    // Kelola Kamar
    public function rooms()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    // Kelola Reservasi
    public function reservations()
    {
        $reservations = Reservation::with(['user','room'])->get();
        return view('reservations', compact('reservations'));
    }
}
