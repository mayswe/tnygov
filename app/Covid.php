<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'body',
        'name_en',
        'short_description_en',
        'body_en',
        'order',
        'news_date',
        'image',
    ];
    
    
}
