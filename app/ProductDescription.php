<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductDescriptionTranslation;

class ProductDescription extends Model
{
    protected $fillable = [
        'product_id', 'image'
    ];

    public function getTranslatedData(){
        
    }
    public function translate($lang, $field){
        $lang_id = \App\Language::where('prefix', $lang)->first();
        $translation = ProductDescriptionTranslation::where('language_id', $lang_id->id)->where('product_description_id', $this->id)->first();
        return $translation->{$field} ?? '';
    }

    public function translations()
    {
        return $this->hasMany(\App\ProductDescriptionTranslation::class);
    }
}
