<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'budget_year',
        'name_en',
        'budget_year_en',
        'pdf_file',
    ];
}
