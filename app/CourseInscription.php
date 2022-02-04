<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInscription extends Model
{
    protected $table = 'course_inscription';
    protected $fillable = [
        'course_id',
        'inscription_id',
        'course',
        'amount',
        'price',
        'subtotal',
        'status',
        'code'
    ];

    public function setCodeAttribute($value)
    {
        $codigo = sprintf('%07X', mt_rand(0, 0xFFFFFFF));
        $this->attributes['code']= $codigo;
    }
}
