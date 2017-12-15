<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Posts;

class InfoBox extends Model
{
    protected $table = 'infobox';

    public static function getListBoxs($filter){
    	$boxs = InfoBox::where($filter)->paginate(10);
    	return $boxs;
    }

    public function category(){
    	return $this->hasOne('App\Entities\Categories', 'id', 'category_id')->select('name');
    }

    public function scopeGetBoxs($query){
        $result = [];
        $boxs = $query->get();
        if(count($boxs) == 0){
            return $query->get();
        }
        foreach ($boxs as $key) {
            $posts = json_decode($key->posts);
            $arr = [];
            for ($i = count($posts) - 1; $i >= 0; $i--) {
                $arr[$i] = $posts[$i]->id;
            };
            if(count($arr)){
                arsort($arr);
                $placeholders = implode(',',array_fill(0, count($arr), '?'));
                $key->posts = Posts::select('id', 'name', 'slug', 'images')->whereIn('id', $arr)->orderByRaw("field(id,{$placeholders})", $arr)->get();
                $result[$key->position][] = $key;
            }else{
                $key->posts = [];
                $result[$key->position][] = $key;
            }
        }
        return $result;
    }

    public static function getBoxsInHome(){
        return InfoBox::select('banner_img', 'posts', 'style', 'position')
            ->where(['status' => 1])
            ->where('home', 1)
            ->orderBy('created_at', 'desc')
            ->getBoxs();
    }

    public static function getBoxsInPostDetail($categoryID){
        return InfoBox::select('banner_img', 'posts', 'style', 'position')
            ->where(['status' => 1])
            ->where('category_id', $categoryID)
            ->orWhere('all_post', 1)
            ->orderBy('created_at', 'desc')
            ->getBoxs();
    }

    public static function getBoxsByCategory($categoryID = []){
        return InfoBox::select('banner_img', 'posts', 'style', 'position')
            ->where(['status' => 1])
            ->whereIn('category_id', $categoryID)
            ->orWhere('all_category', 1)
            ->orderBy('created_at', 'desc')
            ->getBoxs();
    }
}
