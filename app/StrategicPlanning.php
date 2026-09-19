<?php

namespace App;

use App\AnnouncementCat;

use Illuminate\Database\Eloquent\Model;

class StrategicPlanning extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'pdf_file',
    ];
}
