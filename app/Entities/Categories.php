<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    
    protected $fillable = ['name', 'type', 'slug', 'meta_title', 'meta_keyword', 'meta_description', 'position',
        'status', 'parent_id', 'color'];

    public function slider() {
        return $this->hasMany('App\Entities\Slider', 'category_id');
    }

    public function post() {
        return $this->hasMany('App\Entities\Posts', 'category_id');
    }

    public function user() {
    	return $this->belongsToMany('App\Entities\User', 'user_categories', 'category_id', 'user_id');
    }

    public function advertisement() {
        return $this->hasMany('App\Entities\Advertisement', 'category_id');
    }

    public static function getMenu(){
        $menu = Categories::select('id', 'name', 'slug', 'parent_id', 'color')->where('status', 1)->where('parent_id', 0)->get();
        $sub_menu = Categories::select('name', 'slug', 'parent_id')->where('status', 1)->where('parent_id', '!=', 0)->get();
        $menu->map(function($key) use ($sub_menu){
            return $key->sub_menu = $sub_menu->filter(function($ele) use ($key){
                return $ele->parent_id == $key->id;
            })->toArray();
        });
        return $menu->toArray();
    }

    public static function getForPostDetail($categoryId){
        return Categories::select('name', 'slug', 'parent_id')->where('id', $categoryId)->first();
    }

    
}
