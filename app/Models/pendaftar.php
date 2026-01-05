<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'tetala',
        'email',
        'password',
        'instansi',
        'alamat',
        'status',
        'surat',
        'beasiswa_id',
    ];

    public function beasiswa()
    {
        return $this->belongsTo(beasiswa::class, 'beasiswa_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'pendaftar_id');
    }
}
