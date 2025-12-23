<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class beasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'beasiswa';

    protected $fillable = [
        'penyedia',
        'nama_beasiswa',
        'deskripsi',
        'deadline',
        'status',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'deadline' => 'date',
        'password' => 'hashed',
    ];

    public function getDeadlineFormattedAttribute()
    {
        if (!$this->deadline) {
            return '-';
        }

        if ($this->deadline instanceof \Carbon\Carbon) {
            return $this->deadline->format('d/m/Y');
        }

        return \Carbon\Carbon::parse($this->deadline)->format('d/m/Y');
    }
}
