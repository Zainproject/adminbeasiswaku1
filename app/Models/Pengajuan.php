<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';
    protected $fillable = [
        'id_user',
        'beasiswa_id',
        'status_id',
    ];
    public $timestamps = false;

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_user', 'id_user');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id_status');
    }
}
