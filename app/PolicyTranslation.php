<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyTranslation extends Model
{
    protected $fillable = [
        'language_id', 
        'title', 
        'content',
    ];

    public $timestamps = false;

    /** 
     * RELATIONS
     */
    public function language() 
    {
        return $this->belongsTo(\App\Language::class);
    }
}
