<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'image',
    ];
}
