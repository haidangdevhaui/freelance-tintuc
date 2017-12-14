<?php

namespace App\Http\Controllers\FrontEnd;

use App\Entities\Advertisement;
use App\Entities\Categories;
use App\Entities\Posts;
use App\Entities\InfoBox;
use App\Entities\Popup;
use App\Http\Controllers\DesktopController;
use DateTime;
use Illuminate\Support\Facades\Cache;
use View;

use App\Helpers\PostView;

class PostsDetailController extends DesktopController
{

    public function getNewsDetail($slug)
    {
        $slugArr     = explode('-', $slug);
        $id          = $slugArr[count($slugArr) - 1];
        //$post_detail = Posts::find($id);
		$post_detail = Posts::select('*')->where('id', $id)->where('status', 1)->first();

        if (!$post_detail) {
            return view('errors.404');
        }
        /* up view */
        if(!PostView::isViewed($id)){
            $post_detail->views = $post_detail->views + 1;
            $post_detail->timestamps = false;
            $post_detail->save();
        }
        
        $meta = [
            'title'            => $post_detail->name,
            'meta_keywords'    => $post_detail->meta_keyword,
            'meta_robots'      => $post_detail->meta_robots,
            'meta_description' => $post_detail->meta_description,
            'og_image'         => asset($post_detail->images),
        ];
        if($post_detail->is_landing == 1){
            $content = $post_detail->content;
            return view('front_end.desktop.landing', compact('content', 'meta'));
        }
        /**/
        $boxs = InfoBox::getBoxsInPostDetail($post_detail->category_id);
        if($post_detail->post_type != 'video'){
            $category     = Categories::getForPostDetail($post_detail->category_id);
            $sub_category = [];
            $link         = [];
            if ($category->parent_id == 0) {
                $link[0]      = $category;
                $active       = $category->slug;
                // $ads          = Advertisement::getAdvInCategory($post_detail->category_id);
                $sub_category = Categories::select('id', 'name', 'slug')->where('parent_id', $post_detail->category_id)->where('status', '1')->get();
            } else {
                // $ads          = Advertisement::getAdvInCategory($category->parent_id);
                $link[0]      = Categories::select('name', 'slug')->where('id', $category->parent_id)->first();
                $active       = $link[0]->slug;
                $link[1]      = $category;
                $sub_category = Categories::select('id', 'name', 'slug')->where('parent_id', $category->parent_id)->where('status', '1')->get();
            }

            //$post_hot = Posts::getHotForDetail(0, 3);
            // $post_cat = Posts::getInCategory($post_detail->category_id);
            //$side_bar = Posts::getPostsSideBar();
            $list_care = Posts::getPostCare($post_detail->category_id);
            $ads = Advertisement::getAdsInPost();
        }
        //$post_hightlight = Posts::getHighlight();
        /*
         * Thucnv
         * Xử lý lưu cacche các bài viết
         *
         */
        $minutes = 7200;
        // if (!Cache::has('bs_post_hot')) {

        //     Cache::remember('bs_post_hot', $minutes, function () {
        //         return Posts::getHotForDetail(0, 3);
        //     });
        // }
        // $post_hot = Cache::get('bs_post_hot');
        if (!Cache::has('bs_side_bar')) {
            Cache::remember('bs_side_bar', $minutes, function () {
                return Posts::getPostsSideBar();
            });
        }
        $side_bar = Cache::get('bs_side_bar');

        if (!Cache::has('bs_post_hightlight')) {
            Cache::remember('bs_post_hightlight', $minutes, function () {
                return Posts::getHighlight();
            });
        }
        $post_hightlight = Cache::get('bs_post_hightlight');

        

        $post_detail->connect = @json_decode($post_detail->connect) ? json_decode($post_detail->connect) : [];

        if ($post_detail->post_type == 'video') {
            $list_videos = Posts::select('id', 'name', 'slug', 'url')->where("post_type", 'video')->where('status', 1)->where('id', '!=', $id)->orderBy('id', 'desc')->take(4)->get();
            return view('front_end.desktop.news_detail.video', compact('post_detail', 'post_hightlight', 'side_bar', 'meta', 'list_videos'));
        }

        $popup = Popup::getDetailPopup();

        return view('front_end.desktop.news_detail.index', compact('post_detail', 'category', 'sub_category', 'side_bar', 'list_care', 'meta', 'post_hightlight', 'link', 'ads', 'active', 'boxs', 'popup'));
    }

    public static function timeago($time)
    {
        // declaring periods as static function var for future use
        static $periods = array('năm', 'tháng', 'ngày', 'giờ', 'phút', 'giây');
        // getting diff between now and time
        $now  = new DateTime('now');
        $time = new DateTime($time);
        $diff = $now->diff($time)->format('%y %m %d %h %i %s');
        // combining diff with periods
        $diff = explode(' ', $diff);
        $diff = array_combine($periods, $diff);
        // filtering zero periods from diff
        $diff = array_filter($diff);
        // getting first period and value
        $period = key($diff);
        $value  = current($diff);

        // if input time was equal now, value will be 0, so checking it
        if (!$value) {
            $period = 'giây';
            $value  = 0;
        } else {
            // converting days to weeks
            if ($period == 'ngày' && $value >= 7) {
                $period = 'tuần';
                $value  = floor($value / 7);
            }
            // adding 's' to period for human readability
        }

        // returning timeago
        return "$value $period trước";
    }

}
