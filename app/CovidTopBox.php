<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CovidTopBox extends Model
{
    protected $fillable = [
        'type',
        'people',
        'date',
    ];
}