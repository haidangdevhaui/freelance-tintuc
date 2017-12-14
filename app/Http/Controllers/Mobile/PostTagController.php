<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Posts;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;

class PostTagController extends MobileController
{
    public function getNewsTagMb($tag) {
        return 'Chức năng đang được xây dựng';
        $posts = Posts::getPostsByTag($tag);
        $json = json_encode($posts);
        $total = json_decode($json)->total;
        $page = json_decode($json)->current_page;
        $meta = [
            'title' => 'Trang '.$page.' | Tìm kiếm bài viết "'.$tag.'"',
            'meta_keywords' => 'tìm kiếm, tim kiem, timkiem, '.$tag,
            'meta_robots' => 'all',
            'meta_description' => 'Trang '.$page.' | Tìm kiếm bài viết "'.$tag.'"'
        ];
        return view('front_end.desktop.tag', compact('posts', 'tag', 'total', 'meta', 'page'));
    }
}
