<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table = 'bonuses';

    protected $fillable = [
        'naem', 'slug', 'description', 'video', 'file', 'status', 'course_id'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
