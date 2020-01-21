<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescriptionTranslation extends Model
{
    protected $fillable = [
        'language_id', 'product_description_id', 'description'
    ];
}
