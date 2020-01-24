<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 
        'product_id',
        'product_configuration_id',
        'quantity',
    ];

    /** 
     * RELATIONS
     */
    public function product()
    {
        $this->hasOne(\App\Product::class);        
    }

}
