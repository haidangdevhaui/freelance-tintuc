<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Mobile\Posts;
use App\Entities\Posts as PostDesktop;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class HomeController extends MobileController
{
    public function getIndexHomeMb(Request $req)
    {

        if($req->q){
            $q = $req->q;
            $meta    = [
                'title'            => 'Tìm kiếm bài viết "'.$req->q.'"',
                'meta_keywords'    => 'tìm kiếm, tim kiem, timkiem, '.$req->q,
                'meta_robots'      => 'all',
                'meta_description' => 'Tìm kiếm bài viết "'.$req->q.'"',
                'og_image'         => asset('/assets/images/logo.png'),
            ];
            return view('front_end.mobile.pages.search', compact('meta','q'));
        }

        $news    = Posts::getPostsNewest();
        $videos  = PostDesktop::getPostVideo()->toArray();
        $content = Posts::getPostsInHome();
        $meta    = [
            'title'            => 'Sống Mới - Xã Hội, Thế Giới, Kinh Tế, Nghe Nhìn, Ôtô XeMáy, Văn Hóa, Thể Thao, Đời Sống',
            'meta_keywords'    => 'Sống Mới,Sống Mới Online,điện tử nghe nhìn,nghe nhìn Việt Nam,ôtô xe máy Việt Nam,ôtô xe máy,xe và đời sống,tạp chí sống mới,xã hội,thế giới,thị trường,văn hóa,thể thao,đời sống',
            'meta_robots'      => 'index, follow',
            'meta_description' => 'Báo điện tử Sống Mới cùng góc nhìn mới, đa dạng về cuộc sống. Tin nhanh, cập nhật và chuyên sâu về xu hướng, phong cách sống, văn hóa xã hội tại Songmoi.vn.',

            'og_image'         => asset('/assets/images/logo.png'),
        ];
        return view('front_end.mobile.index', compact('news', 'content', 'videos', 'meta'));
    }

    public function getSearch(){
        return view('front_end.mobile.pages.search');
    }

    public function postSearch(Request $req){
        $page = $req->page;
        $posts = Posts::select('id', 'slug', 'name', 'images', 'description')
            ->where('status', 1)
            ->where('name', 'LIKE', '%'.$req->q.'%')
            ->orderBy('created_at', 'desc');
        if($page == 1){
            $html = '<h3>Kết quả tìm kiếm cho "'.$req->q.'" ('.$posts->count().' kết quả)</h3>';
        }else{
            $html = '';
        }
        
        $html .= '<div class="row result">';
        if($posts->skip(($page - 1)*12)->limit(12)->count() == 0){
            return 0;
        }
        foreach ($posts->skip(($page - 1)*12)->limit(12)->get() as $post) {
            $html .= '<div class="box_item_live">';
            $html .= '<a href="'.url($post->slug.'-'.$post->id.'.html').'"><h3>'.$post->name.'</h3></a>';
            $html .= '<div class="media_content">';
            $html .= '<div class="m_left">';
            $html .= '<div class="media"><a href="'.url($post->slug.'-'.$post->id.'.html').'"><img src="'.asset($post->images).'" alt="'.$post->name.'"></a></div>';
            $html .= '</div>';
            $html .= '<div class="content"><p>';
            $html .= Str::words($post->description, 22, '...');
            $html .= '</p>';
            $html .= '</div>';
            $html .= '<div class="clear_fix"></div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        
        echo $html;
    }
}
