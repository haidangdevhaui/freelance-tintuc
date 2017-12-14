<?php

namespace App\Http\Controllers\FrontEnd;

use App\Entities\Advertisement;
use App\Entities\Categories;
use App\Entities\Posts;
use App\Entities\InfoBox;
use App\Entities\Popup;
use App\Entities\PopupMapper;
use App\Http\Controllers\DesktopController;
use DateTime;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class LivingSubstanceController extends DesktopController
{

    public function getIndexLivingSubtance(Request $req, $slug)
    {
        $url = $req->path();
        $arr = explode('/', $url);
        $currentPage = $arr[count($arr) - 1];

        $category = Categories::where('slug', $slug)->first();

        $side_bar  = Posts::getPostsSideBar();
        $list_care = Posts::getPostCare($category->id);

        $id         = $category->id;
        $ads        = Advertisement::getAdsByCategory($category->id);
        $categoryId = [];

        if ($category->parent_id) {
            $cate_parent  = Categories::where('id', $category->parent_id)->select('slug')->first();
            $active       = $cate_parent->slug;
            $rightContent = Posts::getPostRightContentByCategory($id);
            $parentId     = $category->parent_id;
            $sub_menu     = Categories::select('id', 'name', 'slug')->where('parent_id', $parentId)->get();
            $categoryId   = [$id];
            $title = $category->name;

            $idForBox = [$id, $parentId];
            $boxs = InfoBox::getBoxsByCategory($idForBox);
            if((int)$currentPage == 1 || $currentPage == $category->slug){
                $postFixed = Posts::getPostFixedSubCategory($categoryId);
            }
            $level = 2;

            $popup = Popup::getSubCatePopup($id);
        } else {
            $parentId   = $category->id;
            $active     = $category->slug;
            $sub_menu   = Categories::select('id', 'name', 'slug')->where('parent_id', $parentId)->get();
            $categoryId = $sub_menu->pluck('id')->push($parentId);
            $title = $category->name . ' - ' . $category->meta_title;
            $boxs = InfoBox::getBoxsByCategory([$category->id]);

            if((int)$currentPage == 1 || $currentPage == $category->slug){
                $postFixed = Posts::getPostFixedInCategory($categoryId);
            }
            $level = 1;
            $popup = Popup::getCatePopup($id);
        }
        $meta = [
            'title'            => $title,
            'meta_keywords'    => $category->meta_keyword,
            'meta_robots'      => $category->meta_robots,
            'meta_description' => $category->meta_description,
        ];

        $sub_menu = Categories::select('id', 'name', 'slug')->where('parent_id', $parentId)->get();

        $slider = Posts::getPostInSliderByCategory($level, $categoryId);

        $limit = 12;
        
        $post_fulls = Posts::select('id', 'name', 'slug', 'description', 'images', 'created_at')->whereIn('category_id', $categoryId)->where('status', 1);
        if(isset($postFixed)){
            if(count($postFixed['posts'])){
                $limit = 12 - count($postFixed['posts']);
                $post_fulls = $post_fulls->whereNotIn('id', $postFixed['notID']);
            }
            $postFixed = $postFixed['posts'];
        }
        
        $post_fulls = $post_fulls->orderby('id', 'desc')->paginate($limit);

        $videos = Posts::getPostVideo()->toArray();

        return view('front_end.desktop.living_subtance.index', compact('post_fulls', 'sub_menu', 'side_bar', 'slider', 'list_care', 'meta', 'id', 'ads', 'active', 'rightContent', 'videos', 'boxs', 'postFixed', 'popup'));
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
