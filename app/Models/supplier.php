<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    // app/Models/Supplier.php
    protected $fillable = ['supplier_name', 'status', 'address', 'supplier_code'];

}
