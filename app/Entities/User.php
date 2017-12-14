<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsToMany('App\Entities\Roles', 'role_user', 'user_id', 'role_id');
    }
    public function category() {
        return $this->belongsToMany('App\Entities\Categories', 'user_categories', 'user_id', 'category_id')->withPivot('user_id', 'category_id');
    }
    public function post() {
        return $this->hasMany('App\Entities\Posts', 'user_id');
    }

    public static function getCreators(){
        return User::select('id', 'name')->get();
    }
}
