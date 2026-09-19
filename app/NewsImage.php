<?php

namespace App;

use App\News;

use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    protected $fillable = [
        'news_id',
        'name',
    ];

    
    public function package()
    {
        return $this->belongsTo('App\News');
    }
}
