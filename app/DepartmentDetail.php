<?php

namespace App;

use App\DDImage;

use Illuminate\Database\Eloquent\Model;

class DepartmentDetail extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'short_description',
        'short_description_en',
        'body',
        'body_en',
        'district',
        'tsp',
        'department',
        'position',
        'news_date',
        
    ];
    
    public function package()
    {
        return $this->hasMany('App\DDImage');
    }
}
