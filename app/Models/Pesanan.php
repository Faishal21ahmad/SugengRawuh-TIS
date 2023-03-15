<?php

namespace App\Models;

use App\Models\MejaRM;
use App\Models\Pembayaran;
use App\Models\DetailPesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'jenispembayaran_id');
    }
    public function meja()
    {
        return $this->belongsTo(MejaRM::class, 'meja_id');
    }

    public function detailpesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
