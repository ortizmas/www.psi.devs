<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
    	'name', 'slug', 'status', 'university_id'
    ];

    public function university()
    {
    	return $this->belongsTo('App\University');
    }

    public function trainees()
    {
        return $this->hasMany('App\Trainee');
    }
}
