<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $fillable = [
        'status',
    ];
    public $timestamps = false;

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'status_id');
    }
}
