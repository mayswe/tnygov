<?php

namespace App;

use App\Township;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_en',
        'district_id',
    ];

    public function package()
    {
        return $this->hasMany('App\User');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
