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

    /**
     * [us Parent]
     * @return [type] [self relationship]
     */
    public function us()
    {
        return $this->belongsTo(Self::class, 'id', 'parent_id');
    }

    /**
     * [ds Childs]
     * @return [type] [self relationship um a muitos]
     */
    public function ds()
    {
        return $this->hasMany(Self::class, 'parent_id', 'id');
    }

}

