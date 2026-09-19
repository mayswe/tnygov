<?php

namespace App;

use App\CourtRoom;

use Illuminate\Database\Eloquent\Model;

class CourtRoomCat extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\CourtRoom');
    }
}
