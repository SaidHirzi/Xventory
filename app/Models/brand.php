<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable = [
        'kode_brand',
        'nama_brand',
        'status',
    ];

}
