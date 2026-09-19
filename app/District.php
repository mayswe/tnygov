<?php

namespace App;

use App\District;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_en',
    ];

    public function package()
    {
        return $this->hasMany('App\User');
    }
}
