<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'product_stock',
        'product_category',
        'product_brand',
        'product_image',
        'product_description',
    ];

    

}
