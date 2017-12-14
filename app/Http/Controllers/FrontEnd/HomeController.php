<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\DesktopController;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends DesktopController
{
    /**
     * __construct
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * index action
     * @param  Request $req
     * @return view
     */
    public function index(Request $req)
    {
        if($req->q){
            $q = $req->q;
            $meta    = [
                'title'            => 'Tìm kiếm bài viết',
                'meta_keywords'    => 'tìm kiếm, tim kiem, timkiem',
                'meta_robots'      => 'all',
                'meta_description' => 'Tìm kiếm bài viết',
                'og_image'         => asset('/assets/images/logo.png'),
            ];
            return view('front_end.desktop.search', compact('meta', 'q'));
        }

        $sliders = $this->post->getForSlider();

        // $notID = collect($slider)->pluck('id')->toArray();

        // $rightContent = Posts::getPostRightContent();
        // $videos       = Posts::getPostVideo()->toArray();
        // $content      = Posts::getPostsInHome($notID);
        // $ads          = Advertisement::getAdvInHome();
        // $active       = 'home';
        // $meta         = [
        //     'title'            => 'Sống Mới - Thông tin tinh tế, góc nhìn khác biệt',
        //     'meta_keywords'    => 'Sống Mới,Sống Mới Online,điện tử nghe nhìn,nghe nhìn Việt Nam,ôtô xe máy Việt Nam,ôtô xe máy,xe và đời sống,tạp chí sống mới,xã hội,thế giới,thị trường,văn hóa,thể thao,đời sống',
        //     'meta_robots'      => 'index, follow',
        //     'meta_description' => 'Báo điện tử Sống Mới cùng góc nhìn mới, đa dạng về cuộc sống. Tin nhanh, cập nhật và chuyên sâu về xu hướng, phong cách sống, văn hóa xã hội tại Songmoi.vn.',
        //     'og_image'         => asset('/assets/images/logo.png'),
        // ];
        // $boxs = InfoBox::getBoxsInHome();

        // $popup = Popup::getHomePopup();

        // return view('front_end.desktop.index', compact('slider', 'rightContent', 'content', 'ads', 'active', 'meta', 'videos', 'boxs', 'popup'));
    }

    public function getSearch(Request $req){
        $q = $req->q;
        $meta    = [
            'title'            => 'Tìm kiếm bài viết',
            'meta_keywords'    => 'tìm kiếm, tim kiem, timkiem',
            'meta_robots'      => 'all',
            'meta_description' => 'Tìm kiếm bài viết',
            'og_image'         => asset('/assets/images/logo.png'),
        ];
        return view('front_end.desktop.search', compact('meta', 'q'));
    }

    public function postSearch(Request $req){
        $page = $req->page;
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        $posts = Posts::select('id', 'slug', 'name', 'images', 'description', 'created_at')
            ->where('status', 1)
            ->where('name', 'LIKE', '%'.$req->q.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        $html = '<h3>Kết quả tìm kiếm cho "'.$req->q.'" - Trang '.$posts->currentPage().'/'.(ceil($posts->total()/12)).' ('.$posts->total().' kết quả)</h3>';
        $html .= '<div class="row result">';
        foreach ($posts as $post) {
            $html .= '<div class="item-article">';
                $html .= '<a href="'.url($post->slug.'-'.$post->id).'.html">';
                    $html .= '<img class="img-responsive" src="'.asset($post->images).'" alt="'.$post->name.'"/>';
                $html .= '</a>';
                $html .= '<span class="time">';
                    $html .= '<i aria-hidden="true" class="fa fa-clock-o"></i>';
                    $html .= \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post->created_at));
                $html .= '</span>';
                $html .= '<a href="'.url($post->slug.'-'.$post->id).'.html">';
                    $html .= $post->name;
                $html .= '</a>';
                $html .= '<p>';
                    $html .=  Str::words($post->description, 20, '...');
                $html .= '</p>';
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '<div class="row">';
        $html .= '<div class="pagination phantrang">';
        $html .= $posts->render();
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }
}
