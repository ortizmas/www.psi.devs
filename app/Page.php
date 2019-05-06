<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    	'parent_id', 'title', 'slug', 'description', 'content', 'redirect', 'external_url', 'target', 'order', 'enabled', 'section_id', 'user_id'
    ];

    public function section()
    {
    	return $this->belongsTo('App\Section');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
