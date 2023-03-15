<?php

namespace App\Models;

use App\Models\Adminrm;
use App\Models\Kategori;
use App\Models\DetailPesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuRM extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Adminrm::class, 'adminrm_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function detailpesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
