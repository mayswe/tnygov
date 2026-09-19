<?php

namespace App;

use App\Media;

use Illuminate\Database\Eloquent\Model;

class MediaCat extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\Media');
    }
}
