<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservasi'; // sesuai tabel

    protected $fillable = [
        'user_id', 'kamar_id', 'tanggal_checkin', 'tanggal_checkout', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class, 'kamar_id');
    }
}
