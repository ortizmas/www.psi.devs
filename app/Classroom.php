<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'video', 'file', 'views', 'order', 'status', 'module_id'];

    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['name']) && !isset($data['description']) && !isset($data['module_id']))
            return $this->with('module')->paginate($total);

        $classrooms = $this->where(function($query) use ($data) {

            if (isset($data['filter'])) {
                $filter = $data['filter'];
                $query->where('name', $filter);
                $query->orWhere('description', 'LIKE', '%{$filter}%');
            }

            if (isset($data['name'])) {
                $query->where('name', $data['name']);
            }

            if (isset($data['module_id'])) {
                $query->where('module_id', $data['module_id']);
            }

            if (isset($data['description'])) {
                $description = $data['description'];
                $query->where('description', 'LIKE', '%{$description}%');
            }
            
        })->orderBy('order')->with('module')->paginate($total);

        if (count($classrooms) > 0) {
            return $classrooms;
        } else {
            return false;
        }
        
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function assignments()
    {
        //return $this->hasMany(Assignment::class, 'classroom_id', 'id')
        return $this->hasMany(Assignment::class);
    }

    public function annotation()
    {
        return $this->hasOne(Annotation::class);
    }

    public function annotations()
    {
        return $this->hasMany(Annotation::class);
    }
}
