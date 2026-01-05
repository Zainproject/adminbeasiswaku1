<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftar;

class beasiswa extends Model
{
    protected $table = 'beasiswa';
    protected $fillable = [
        'nama_beasiswa',
        'penyedia',
        'deadline',
        'deskripsi',
        'email',
        'password',
    ];
    protected $casts = [
        'deadline' => 'date',
    ];
    public $timestamps = false;

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'beasiswa_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'beasiswa_id');
    }
}
