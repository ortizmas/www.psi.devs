<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'description', 'order', 'status', 'course_id'];

    public function getResults($data, $total)
    {
        if(!isset($data['filter']) && !isset($data['name']) && !isset($data['description']) && !isset($data['course_id']))
            return $this->with('course')->paginate($total);
        
        
        $modules = $this->where(function($query) use ($data){

            if(isset($data['filter'])){
                $filter = $data['filter'];
                $query->where('name', $filter);
                $query->orWhere('description', 'LIKE', '%{$filter}%');
            }

            if(isset($data['name'])){
                $query->where('name', $data['name']);
            }

            if(isset($data['course_id'])){
                $query->where('course_id', $data['course_id']);
            }

            if(isset($data['description'])){
                $description = $data['description'];
                $query->where('description', 'LIKE', '%{$description}%');
            }
        })->orderBy('order')->with('course')->paginate($total);

        if (count($modules) > 0) {
            return $modules;
        } else {
            return false;
        }
        
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
