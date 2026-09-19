<?php

namespace App;

use App\CourtRoomCat;

use Illuminate\Database\Eloquent\Model;

class CourtRoom extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'show_date',
        'long_description',
    ];

    public function package()
    {
        return $this->belongsTo('App\CourtRoomCat');
    }
}
