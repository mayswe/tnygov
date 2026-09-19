<?php

namespace App;

use App\Position;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
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
