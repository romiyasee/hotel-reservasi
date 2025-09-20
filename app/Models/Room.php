<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'kamar'; // sesuai tabel
    protected $fillable = ['nama_kamar','tipe','harga','deskripsi','foto'];

    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class, 'kamar_id');
    }
}
