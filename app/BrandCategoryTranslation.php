<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandCategoryTranslation extends Model
{
    protected $fillable = [
        'language_id', 
        'brand_category_id',
        'name',
    ];
}
