<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Categories;
use App\Entities\Advertisement;
use App\Entities\Mobile\Posts;
use App\Http\Controllers\MobileController;
use Carbon\Carbon;
use View;

class PostDetailController extends MobileController
{
    public function getNewsDetailMb($slug)
    {
        $slugArr            = explode('-', $slug);
        $id                 = $slugArr[count($slugArr) - 1];
        //$post_detail        = Posts::find($id);
		$post_detail = Posts::select('*')->where('id', $id)->where('status', 1)->first();
        $post_detail->views = $post_detail->views + 1;
        $post_detail->timestamps = false;
        $post_detail->save();
        Carbon::setLocale('vi');
        $date_created = \Carbon\Carbon::createFromTimeStamp(strtotime($post_detail->created_at))->diffForHumans();
        $author       = $post_detail->user;
        $tags         = $post_detail->tags;

        $arr_meta_keyword = explode(',', $post_detail->meta_keyword);
        $list_videos      = [];
        if ($post_detail->post_type == 'video') {
            $list_videos = Posts::select('name', 'slug', 'url')->where("post_type", 'video')->where('status', 1)->where('id', '!=', $id)->orderBy('id', 'desc')->take(6)->get();
        }
        $meta = [
            'title'            => $post_detail->name,
            'meta_keywords'    => $post_detail->meta_keyword,
            'meta_robots'      => $post_detail->meta_robots,
            'meta_description' => $post_detail->meta_description,
            'og_image'         => asset($post_detail->images),
        ];

        $post_detail_news = Posts::getNewPost();
        $post_hot         = Posts::getPostsByCondition(['hot' => 1]);
        $posts_care       = Posts::getPostsByCondition(['is_care' => 1]);
        $post_cats        = Posts::getPostsByCondition(['category_id' => $post_detail->category_id]);

        $category = Categories::select('id', 'parent_id', 'name', 'slug')->where('id', $post_detail->category_id)->first();
        $active   = $category->slug;
        if ($category->parent_id) {
            $sub_menu = Categories::select('id', 'name', 'slug')->where('parent_id', $category->parent_id)->get();
            $category = Categories::select('name', 'slug', 'color')->where('id', $category->parent_id)->first();
        } else {
            $sub_menu = Categories::select('id', 'name', 'slug')->where('parent_id', $category->id)->get();
        }

        $ads = Advertisement::getAdsMobile();

        return view('front_end.mobile.post_detail.index', compact(
            'post_detail',
            'post_detail_news',
            'post_cats',
            'post_hot',
            'posts_care',
            'tags',
            'author',
            'date_created',
            'id',
            'meta',
            'arr_meta_keyword',
            'video_new',
            'list_videos',
            'category',
            'sub_menu',
            'active',
            'ads'
        )
        );
    }
}
