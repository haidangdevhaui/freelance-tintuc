<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Categories;
use App\Entities\Menu;
use Illuminate\Support\Facades\Input;

class Url_alias extends Model {

	protected $table = 'url_alias';
	protected $fillable = ['id', 'pid', 'url_old', 'url_new', 'src'];

}
