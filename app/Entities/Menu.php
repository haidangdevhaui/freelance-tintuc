<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{

	protected $table = 'menu';
	
	public static function getMenu(){
		return Menu::where('parent_id', 0)->get();
	}

}