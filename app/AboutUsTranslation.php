<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    protected $fillable = [
        'language_id',
        'imagename_main',
        'imagename_1',
        'imagename_2',
        'imagename_3',
        'title', 
        'content',
    ];
}
