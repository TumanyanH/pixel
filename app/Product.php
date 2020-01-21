<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_category_id', 'name', 'slug', 'price', 'sale_price', 'sale_discount', 
    ];

    public static function get_product_category_type($category_id)
    {
        $category = \App\BrandCategory::with('brand')->findOrFail($category_id);
        return $category->brand->isCategory;
    }

    public function category()
    {
        return $this->belongsTo(\App\BrandCategory::class, 'brand_category_id', 'id');
    }

    public function storages()
    {
        return $this->hasMany(\App\ProductStorageDetail::class);
    }

    public function colors()
    {
        return $this->hasMany(\App\ProductColorDetail::class);
    }

    public function descriptions()
    {
        return $this->hasMany(\App\ProductDescription::class);
    }
}
