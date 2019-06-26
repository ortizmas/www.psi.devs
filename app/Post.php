<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title', 'slug', 'image', 'description', 'content', 'date_start', 'date_end', 'redirect', 'external_url', 'target', 'author', 'order', 'payment_link', 'status', 'category_id', 'user_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getCategoriesForPosts()
    {
        $categories = DB::table('categories AS c')
            ->join('posts', 'c.id', '=', 'posts.category_id')
            ->select('c.id', 'c.name', 'c.slug')
            ->groupBy('c.name')
            ->orderBy('c.name', 'asc')
            ->get();

        return $categories;
    }
}
