<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'tlp',
    ];

    public function paket(){
        return $this->hasMany(Paket::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
