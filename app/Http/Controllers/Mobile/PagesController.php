<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\MobileController;
use App\Entities\Categories;
use App\Entities\Posts;
use App\Entities\Advertisement;
use DB;

class PagesController extends MobileController
{
    public function getIndexPageMb($slug) {
    	$category = Categories::where('slug', $slug)->first();
        $id = $category->id;
        $list_menu = config('menu');
        $sub_menu = [];
        $arr_cate_id = [];
        for ($i=0; $i < count($list_menu); $i++) { 
            $sub = $list_menu[$i]['sub'];
            if($list_menu[$i]['slug'] == $slug ){
                $sub_menu = $sub;
                $arr_cate_id = $list_menu[$i]['category_id'];
                $id = Categories::where('slug', $slug)->first()->id;
            }else{
                for ($j=0; $j < count($sub); $j++) { 
                    if($sub[$j]['slug'] == $slug){
                        $sub_menu = $sub;
                        $id = $sub[$j]['id'];
                        $arr_cate_id = $sub[$j]['category_id'];
                    }
                }
            }
        }
        $post_fulls = Posts::whereIn('category_id', $arr_cate_id)->where('status', 1)->orderby('id','desc')->paginate(12)->toArray();
        
        $post_fulls = $post_fulls['data'];
        $side_bar = Posts::getPostsSideBar();
        $post_hot = Posts::where('post_type', 'news')->where('status', 1)->orderby('id','desc')->take(3)->get();
        $post_newest= Posts::where('post_type', 'new')->where('status', 1)->orderby('views','desc')->take(3)->get();
        // $ads = Advertisement::getAdsMobile($id); 
        $active = $category->slug;
        $meta = [
            'title'            => $category->name . ' - ' . $category->title,
            'meta_keywords' => $category->meta_keyword,
            'meta_robots' => $category->meta_robots,
            'meta_description' => $category->meta_description
        ];
        $cid = implode(',',$arr_cate_id);
        if($category->parent_id != 0){
            $category = Categories::select('name', 'slug')->where('id', $category->parent_id)->first();
        }
        return view('front_end.mobile.pages.index',compact('post_fulls','sub_menu','side_bar','active','post_hot','post_newest','meta','cid', 'category'));
    }

    public function postNewMore(Request $req){
        $arr_cate_id = explode(',', $req->cid);
        $newmore =  Posts::whereIn('category_id', $arr_cate_id)->skip($req->num)->take(6)->orderby('id','desc')->get();
        return $newmore;
    }

    public function postSearch(Request $req){
        $posts =  Posts::select('id', 'name', 'slug', 'images', 'description')->where('post_type','news')->where('name', 'like' , '%'.$req->s.'%')->limit(10)->get();
        $keyword = $req->s;
        $count = Posts::select(\DB::raw('count(1) as total'))->where('post_type','news')->where('name', 'like' , '%'.$req->s.'%')->first();
        return view('front_end.mobile.pages.search',compact('posts','keyword', 'count'));
    }

    public function loadMoreSearch(Request $req){
        return Posts::select('id', 'name', 'slug', 'images', 'description')->where('post_type','news')->where('name', 'like' , '%'.$req->s.'%')->skip($req->skip)->limit(10)->get();
    }
}
