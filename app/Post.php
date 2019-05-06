<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title', 'slug', 'image', 'description', 'content', 'date_start', 'date_end', 'redirect', 'external_url', 'target', 'author', 'order', 'status', 'category_id', 'user_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
