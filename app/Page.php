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

    public function parent() {
        return $this->hasOne('App\Page', 'id', 'parent_id');
    }

    public function childs() {
        return $this->hasMany('App\Page','parent_id','id') ;
    }

    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('order')->get();
    }
}
