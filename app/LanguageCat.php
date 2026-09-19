<?php

namespace App;

use App\DailyActivity;

use Illuminate\Database\Eloquent\Model;

class LanguageCat extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\DailyActivity');
    }
}
