<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStorageDetail extends Model
{
    protected $fillable = [
        'product_id', 'storage'
    ];

}
