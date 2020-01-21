<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductConfiguration extends Model
{

    protected $fillable = ['price', 'sale_price', 'sale_discount', 'in_stock'];
    
    public function product() {
        return $this->belongsTo(\App\Product::class);
    }

    public function storage() 
    {
        return $this->belongsTo(\App\ProductStorageDetail::class, 'storage_id');
    }

    public function color() 
    {
        return $this->belongsTo(\App\ProductColorDetail::class, 'color_id');
    }
    
}
