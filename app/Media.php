<?php

namespace App;

use App\MediaCat;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'category_id',
        'show_date',
        'media_file',
        'media_file_en',
    ];

    public function package()
    {
        return $this->belongsTo('App\MediaCat');
    }
}
