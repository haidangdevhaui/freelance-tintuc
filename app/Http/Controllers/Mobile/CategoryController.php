<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Categories;
use App\Entities\Posts;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;

class CategoryController extends MobileController
{
    public function getIndexCateMb($slug) {
    	$category = Categories::select('id', 'parent_id')->where('slug', $slug)->first();
    	$id = $category->id;
        if($category->parent_id == 0){
            $childs = Categories::select('id', 'name', 'slug')->where('parent_id', $category->id)->get();
        }else{
            $parent = Categories::select('id', 'name', 'slug')->where('id', $category->parent_id)->first();
            $childs = Categories::select('id', 'name', 'slug')->where('parent_id', $parent->id)->get();
        }
        $highs = Posts::getHighPostByCategory($id);
        $posts = Posts::getPostByCategory($id);
        return view('front_end.mobile.cates.index', compact('category', 'childs', 'parent', 'highs', 'posts'));
    }
}
