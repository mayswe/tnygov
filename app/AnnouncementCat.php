<?php

namespace App;

use App\Announcement;

use Illuminate\Database\Eloquent\Model;

class AnnouncementCat extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\Announcement');
    }
}
