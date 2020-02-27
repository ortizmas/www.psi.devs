<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = strtolower($value);
    }
}
