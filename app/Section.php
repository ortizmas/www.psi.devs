<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'enabled'
    ];

    public function pages()
    {
    	return $this->hasMany('App\Page');
    }
    
}
