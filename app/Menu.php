<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Harimayco\Menu\Models\Menus;
// use Harimayco\Menu\Models\MenuItems;

class Menu extends Model
{
    protected $fillabel = [];

    public static function getByName($name)
    {
    	return Menu::where('name', $name)->first();
    }
}
