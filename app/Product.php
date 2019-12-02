<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_category_id', 'name', 'slug', 'price', 'sale_price', 'sale_discount', 
    ];

    public function storages()
    {
        return $this->hasMany(\App\ProductStorageDetail::class);
    }

    public function colors()
    {
        return $this->hasMany(\App\ProductColorDetail::class);
    }
}
