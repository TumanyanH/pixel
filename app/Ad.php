<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'image', 'link', 'isSlider', 'sort'   
    ];
}
