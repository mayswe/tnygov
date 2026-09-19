<?php

namespace App;

use App\AnnouncementCat;

use Illuminate\Database\Eloquent\Model;

class OthersPDF extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'pdf_file',
    ];
}
