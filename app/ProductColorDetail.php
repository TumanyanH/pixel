<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColorDetail extends Model
{
    protected $fillable = [
        'product_id', 'color', 'color_name', 'color_image'
    ];
}
