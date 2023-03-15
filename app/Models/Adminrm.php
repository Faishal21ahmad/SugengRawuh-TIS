<?php

namespace App\Models;


use App\Models\Kategori;
use App\Models\Pembayaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\Adminrm as Authenticatable;

class Adminrm extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }

    public function meja()
    {
        return $this->hasMany(Meja::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
