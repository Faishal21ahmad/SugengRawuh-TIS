<?php

namespace App\Models;

use App\Models\Adminrm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function menu()
    {
        return $this->hasMany(MenuRM::class);
    }

    public function admin()
    {
        return $this->belongsTo(Adminrm::class, 'adminrm_id');
    }
}
