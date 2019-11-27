<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'sort',
    ];

    
    public function categories()
    {
        return $this->hasMany(\App\BrandCategory::class)->with('translations');
    }
}
