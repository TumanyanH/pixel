<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    protected $fillable = [
        'brand_id', 
        'image',
        'sort',
    ];

    public function getTranslatedData(){
        
    }
    public function translate($lang, $field){
        $lang_id = \App\Language::where('prefix', $lang)->first();
        $translation = BrandCategoryTranslation::where('language_id', $lang_id->id)->where('brand_category_id', $this->id)->first();
        return $translation->{$field} ?? '';
    }

    public function translations()
    {
        return $this->hasMany(\App\BrandCategoryTranslation::class);
    }

    public function products()
    {
        return $this->hasMany(\App\Product::class)->with('colors', 'storages');
    }

    public function brand()
    {
        return $this->belongsTo(\App\Brand::class);
    }
}
