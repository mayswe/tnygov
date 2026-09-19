<?php

namespace App;

use App\DDImage;

use Illuminate\Database\Eloquent\Model;

class DDImage extends Model
{
    protected $fillable = [
        'news_id',
        'name',
    ];

    
    public function package()
    {
        return $this->belongsTo('App\DD');
    }
}
