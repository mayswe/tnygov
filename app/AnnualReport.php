<?php

namespace App;

use App\AnnouncementCat;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'pdf_file',
        'pdf_file_en',
        'cover',
        'cover_en',
    ];
}
