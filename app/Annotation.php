<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
{
    protected $table = 'annotations';

    protected $fillable = [
        'description'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
