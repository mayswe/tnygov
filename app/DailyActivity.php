<?php

namespace App;

use App\DailyActivityCat;

use Illuminate\Database\Eloquent\Model;

class DailyActivity extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'short_description',
        'short_description_en',
        'body',
        'body_en',
        
        
        
    ];

    public function package()
    {
        return $this->belongsTo('App\DailyActivityCat');
    }
}
