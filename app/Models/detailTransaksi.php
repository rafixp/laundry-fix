<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'keterangan',
    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }
}
