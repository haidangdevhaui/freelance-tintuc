<?php

namespace App\Entities\Mobile;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

	protected $table    = 'posts';
    protected $fillable = ['name', 'slug', 'description', 'content', 'category_id', 'images'];
	public $timestamps = false;

	public static function getPostsNewest() {
		return Posts::select('id', 'name', 'slug', 'images', 'description')->where('status', 1)->where('post_type', '!=', 'video')->orderBy('id', 'desc')->limit(5)->get()->toArray();
	}

	public static function getPostsHot() {
		return Posts::select('id', 'name', 'slug', 'images', 'description')->where('status', 1)->where('hot', 1)->where('post_type', 'news')->limit(5)->get()->toArray();
	}

	public static function getPostsInHome() {
		$content = collect(config('post_home'));
		$response = [];
		foreach ($content as $key => $value) {
			$response[$key] = Posts::select('id', 'name', 'slug', 'description', 'images')->where('status', 1)->where('post_type', 'news')->whereIn('category_id', $value['category_id'])->orderBy('id', 'desc')->limit($value['limit'])->get()->toArray();
		}
		return $response;
	}

	public static function getHighPostByCategory($id, $limit = 3) {
		return Posts::select('id', 'name', 'slug')->where('status', 1)->where('hightlights', 1)->where('category_id', $id)->orderBy('id', 'desc')->limit($limit)->get();
	}

	public static function getPostByCategory($id, $limit = 13) {
		return Posts::select('id', 'name', 'slug', 'images')->where('status', 1)->where('category_id', $id)->where('post_type', 'news')->orderBy('id', 'desc')->limit($limit)->get();
	}

	public static function getNewPost($limit = 8) {
		return Posts::select('id', 'name', 'slug', 'images', 'description')->where('status', 1)->where('post_type', 'news')->orderBy('id', 'desc')->limit($limit)->get();
	}

	public static function getPostsByCondition($condition, $limit = 8) {
		return Posts::select('id', 'name', 'slug', 'images', 'description')->where('status', 1)->where('post_type', 'news')->where($condition)->orderBy('id', 'desc')->limit($limit)->get();
	}

}
