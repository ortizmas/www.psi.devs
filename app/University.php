<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
    	'initials', 'title', 'address', 'description','status'
    ];

    public function courses()
    {
    	return $this->hasMany('App\Course');
    }
}
