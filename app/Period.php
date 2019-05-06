<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
    	'year', 'enabled'
    ];

    public function trainees()
    {
        return $this->hasMany('App\Trainee');
    }
}
