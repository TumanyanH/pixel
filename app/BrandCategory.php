<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    protected $fillable = [
        'brand_id', 
        'image',
        'sort',
    ];
}
