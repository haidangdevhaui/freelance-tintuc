<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    
    public static function createMap($data){
    	\DB::table('tag_mappers')->insert($data);
    }

    public static function deleteMap($postID){
    	\DB::table('tag_mappers')->where('post_id', $postID)->delete();	
    }

    public static function getTagMap($postID){
    	$tagID = \DB::table('tag_mappers')->where('post_id', $postID)->get()->pluck('tag_id')->toArray();
    	return Tag::select('id', 'name')->whereIn('id', $tagID)->get();
    }
}
