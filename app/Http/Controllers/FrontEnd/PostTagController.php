<?php

namespace App\Http\Controllers\FrontEnd;

use App\Entities\Posts;
use App\Http\Controllers\FrontEnd\PostsDetailController;
use Illuminate\Http\Request;

class PostTagController extends PostsDetailController
{
    public function getPostTag($tag) {
    	$posts = Posts::getPostsByTag($tag);
        $json = json_encode($posts);
        $total = json_decode($json)->total;
        $page = json_decode($json)->current_page;
        $meta = [
            'title' => 'Trang '.$page.' | Thẻ bài viết "'.$tag.'"',
            'meta_keywords' => 'gắn thẻ, '.$tag,
            'meta_robots' => 'all',
            'meta_description' => 'Trang '.$page.' | Thẻ bài viết "'.$tag.'"'
        ];
        return view('front_end.desktop.tag', compact('posts', 'tag', 'total', 'meta', 'page'));
    }
}
