<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    protected $fillable = ['name', 'slug', 'description', 'level'];

    public function user() {
    	return $this->belongsToMany('App\Entities\User', 'role_user', 'role_id', 'user_id');
    }
}
