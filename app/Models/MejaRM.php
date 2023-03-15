<?php

namespace App\Models;

use App\Models\Adminrm;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MejaRM extends Model
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

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
