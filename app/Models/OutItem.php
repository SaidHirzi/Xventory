<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_name',
        'product_category',
        'product_brand',
        'product_stock',
        'product_description',
        'product_image',
    ];
}
