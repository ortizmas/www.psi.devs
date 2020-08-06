<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    protected $table = 'annotations';

    protected $fillable = [
        'user_id', 'course_id', 'classroom_id', 'description'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
