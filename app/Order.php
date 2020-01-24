<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'recieve_method',
        'fullname',
        'phone_number',
        'email',
        'address',
        'status',
        'message'
    ];

    /** 
     * RELATIONS
     */
    public function products()
    {
        return $this->hasMany(\App\OrderProduct::class)->with('product');
    }

}
