<?php

namespace App;

use App\CauseListCat;

use Illuminate\Database\Eloquent\Model;

class PostponeList extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'category_id',
        'pdf_file',
    ];

    public function package()
    {
        return $this->belongsTo('App\CauseListCat');
    }
}
