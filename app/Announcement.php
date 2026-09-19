<?php

namespace App;

use App\AnnouncementCat;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'long_description',
        'pdf_file',
        'image',
    ];

    public function package()
    {
        return $this->belongsTo('App\AnnouncementCat');
    }
}
