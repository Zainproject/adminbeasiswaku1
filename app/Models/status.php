<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $fillable = ['id_status', 'status'];
    protected $primaryKey = 'id_status';
    public $timestamps = false;
}
