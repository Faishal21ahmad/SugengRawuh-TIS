<?php

namespace App\Models;

use App\Models\MenuRM;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPesanan extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
    public function menu()
    {
        return $this->belongsTo(MenuRM::class, 'menu_id');
    }
}
