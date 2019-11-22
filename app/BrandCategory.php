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
        $lang_id = \App\Language::findOrFail($lang);
        $translation = BrandCategory::where('language_id', $lang_id->id)->first();
        return $translation->[$field] ?? '';
    }
}
