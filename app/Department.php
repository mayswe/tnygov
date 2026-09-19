<?php

namespace App;

use App\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\User');
    }
}
