<?php

namespace App\Http\Controllers\FrontEnd;

use App\Entities\Advertisement;
use App\Entities\Categories;
use App\Entities\Posts;
use App\Entities\Video;
use App\Http\Controllers\Controller;
use DB;

class NewLifeController extends Controller {
	public function getNewLife($slug) {
        $id = Categories::where('slug', $slug)->first()->id;
        
		$cats = Categories::find($id);
		$cat_parent = Categories::where('id', $cats->parent_id)->where('status', 1)->first();
		$cat_children = Categories::where('parent_id', $cat_parent->id)->where('status', 1)->get();
		$post_cats = Posts::where('category_id', $id)->where('status', 1)->orderBy('id', 'desc')->paginate(12);
		$post_new = Posts::where('category_id', $id)->where('status', 1)->orderBy('id', 'desc')->take(8)->get();
		$post_new_site = Posts::where('post_type', 'news')->where('status', 1)->orderBy('id', 'desc')->take(5)->get();
		$post_most_view_default = DB::table('posts')->join('post_view', 'posts.id', '=', 'post_view.post_id')->orderBy('count_view', 'desc')->get()->take(5);
		$advers_header = Advertisement::where('category_id', 21)->where('status', 1)->get();
		$advers_content1 = Advertisement::where('category_id', 22)->where('status', 1)->get();
		$advers_sidebar = Advertisement::where('category_id', 23)->where('status', 1)->get();
		$video_cat = Posts::where('post_type', 'video')->where('status', 1)->orderBy('id', 'desc')->take(1)->get();
		$video_cat_list = Posts::where('post_type', 'video')->where('status', 1)->orderBy('id', 'desc')->skip(1)->take(3)->get();
		return view('front_end.desktop.new_life.index', compact('cat_children', 'post_cats', 'advers_header',
			'advers_content1', 'advers_sidebar', 'video_cat', 'cats', 'post_new', 'post_new_site', 'post_most_view_default', 'video_cat_list'));
	}
}
