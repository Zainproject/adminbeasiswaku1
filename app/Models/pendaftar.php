<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nama_lengkap',
        'tetala',
        'email',
        'password',
        'instansi',
        'status',
        'surat',
    ];
}
