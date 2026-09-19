<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'name_en',
        'short_description_en',
        'long_description_en',
        'image',
        'order',
    ];
}
