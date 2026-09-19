<?php

namespace App;

use App\CauseList;

use Illuminate\Database\Eloquent\Model;

class CauseListCat extends Model
{
    protected $fillable = [
        'name',
        'name_en',
    ];

    public function package()
    {
        return $this->hasMany('App\CauseList');
    }
}
