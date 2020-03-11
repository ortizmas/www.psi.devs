<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $trainees;

    protected $fillable = [
    	'name',
        'email',
    	'slug',
    	'age',
        'gender',
    	'marital_status',
    	'some_charges',
    	'image',
    	'description',
    	'content',
    	'enabled',
    	'external_url',
    	'redirect',
    	'author',
        'have_job',
        'office',
        'company',
        'order',
    	'user_id',
    	'course_id',
    	'period_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }

    public function period()
    {
    	return $this->belongsTo('App\Period');
    }

}
