<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $fillable = [
        'product_id', 'description', 'image'
    ];
    
}
