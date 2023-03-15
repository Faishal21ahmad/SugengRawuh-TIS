<?php

namespace App\Models;

use App\Models\Adminrm;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function admin()
    {
        return $this->belongsTo(Adminrm::class, 'adminrm_id');
    }
}
