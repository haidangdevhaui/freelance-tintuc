<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\DesktopController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends DesktopController
{
    /**
     * __construct
     */
    public function __construct(Post $post, Category $category, Video $video, Request $request)
    {
        $this->post     = $post;
        $this->category = $category;
        $this->video    = $video;
        parent::__construct($category, $request);

        if ($request->isMethod('GET')) {
            $videos = $this->video->getTop();
            view()->share(compact('videos'));
        }
    }

    /**
     * index action
     * @param  Request $req
     * @return view
     */
    public function index(Request $req)
    {
        if ($req->q) {
            $q    = $req->q;
            $meta = [
                'title'            => 'Tìm kiếm bài viết',
                'meta_keywords'    => 'tìm kiếm, tim kiem, timkiem',
                'meta_robots'      => 'all',
                'meta_description' => 'Tìm kiếm bài viết',
                'og_image'         => asset('/assets/images/logo.png'),
            ];
            return view('front_end.desktop.search', compact('meta', 'q'));
        }

        $slider       = $this->post->getForSlider();
        $rightContent = $this->post->getForRightContent(4);
        $content      = $this->post->getContent();
        $video        = [];
        $active       = 'home';
        $meta         = [
            'title'            => config('site.meta.title'),
            'meta_keywords'    => config('site.meta.meta_keywords'),
            'meta_robots'      => config('site.meta.meta_robots'),
            'meta_description' => config('site.meta.meta_description'),
            'og_image'         => config('site.meta.og_image'),
        ];

        return view('front_end.desktop.index', compact(
            'meta',
            'slider',
            'rightContent',
            'content',
            'active',
            'meta',
            'videos'
        ));
    }

    /**
     * get search page
     * @param  Request $req
     * @return view
     */
    public function search(Request $req)
    {
        $q    = $req->q;
        $meta = [
            'title'            => 'Tìm kiếm bài viết',
            'meta_keywords'    => 'tìm kiếm, tim kiem, timkiem',
            'meta_robots'      => 'all',
            'meta_description' => 'Tìm kiếm bài viết',
            'og_image'         => asset('/assets/images/logo.png'),
        ];
        return view('front_end.desktop.search', compact('meta', 'q'));
    }

    /**
     * fetch search result
     * @param  Request $req
     * @return HTML
     */
    public function fetchSearch(Request $req)
    {
        $page = $req->page;
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        $posts = $this->select('id', 'slug', 'title', 'image', 'description', 'created_at')
            ->where('title', 'LIKE', '%' . $req->q . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        $html = '<h3>Kết quả tìm kiếm cho "' . $req->q . '" - Trang ' . $posts->currentPage() . '/' . (ceil($posts->total() / 12)) . ' (' . $posts->total() . ' kết quả)</h3>';
        $html .= '<div class="row result">';
        foreach ($posts as $post) {
            $html .= '<div class="item-article">';
            $html .= '<a href="' . url($post->slug . '-' . $post->id) . '.html">';
            $html .= '<img class="img-responsive" src="' . asset($post->image) . '" alt="' . $post->title . '"/>';
            $html .= '</a>';
            $html .= '<span class="time">';
            $html .= '<i aria-hidden="true" class="fa fa-clock-o"></i>';
            $html .= \App\Http\Controllers\FrontEnd\LivingSubstanceController::timeago(date($post->created_at));
            $html .= '</span>';
            $html .= '<a href="' . url($post->slug . '-' . $post->id) . '.html">';
            $html .= $post->title;
            $html .= '</a>';
            $html .= '<p>';
            $html .= Str::words($post->description, 20, '...');
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

    /**
     * category action
     * @param  Request $request
     * @return view
     */
    public function category(Request $request, $slug)
    {
        if (!$category = $this->category->where(compact('slug'))->first()) {
            abort(404);
        }

        $posts       = $this->post->getPostByCategory($category->id);
        $postSideBar = $this->post->getPostForSideBar($category->id);
        $postCare    = [];
        $slider      = $this->post->getForSlider();

        if (!$category->parent_id) {
            $parentId      = $category->id;
            $subCategories = $this->category->getSub($category->id);
        } else {
            $parentId = $category->parent_id;
        }

        $menuActive = str_replace('.', '-', $request->route()->getName()) . '-' . $parentId;

        $meta = [
            'title'            => $category->name,
            'meta_keywords'    => $category->name,
            'meta_robots'      => 'index, follow',
            'meta_description' => $category->name,
            'og_image'         => config('site.meta.og_image'),
        ];

        return view('front_end.desktop.category.index', compact(
            'meta',
            'menuActive',
            'category',
            'posts',
            'postSideBar',
            'slider',
            'postCare',
            'subCategories'
        ));
    }

    /**
     * post detail action
     * @param  Request $request
     * @param  string  $slug
     * @return view
     */
    public function post(Request $request, $slug)
    {
        if (!$post = $this->post->where(compact('slug'))->first()) {
            abort(404);
        }
        $categoryFirst = $this->category->getById($post->category_id);
        if ($categoryFirst->parent_id) {
            $categorySecend = $this->category->getById($categoryFirst->parent_id);
        }

        $postHigh    = $this->post->getHigh($post->category_id);
        $postSideBar = $this->post->getPostForSideBar($post->category_id);

        $meta = [
            'title'            => $post->title,
            'meta_keywords'    => $post->meta_keyword,
            'meta_robots'      => 'index, follow',
            'meta_description' => $post->meta_description ? $post->meta_description : $post->description,
            'og_image'         => config('site.meta.og_image'),
        ];

        return view('front_end.desktop.post.index', compact(
            'meta',
            'categoryFirst',
            'categorySecend',
            'postHigh',
            'postSideBar',
            'post'
        ));
    }

    /**
     * get video detail
     * @return view
     */
    public function videoDetail(Request $request, $slug = null)
    {
        if (!$video = $this->video->where(compact('slug'))->first()) {
            abort(404);
        }
        $postSideBar = $this->post->getPostForSideBar();
        $meta        = [
            'title'            => $video->title,
            'meta_keywords'    => $video->meta_keyword,
            'meta_robots'      => 'index, follow',
            'meta_description' => $video->meta_description ? $video->meta_description : $video->description,
            'og_image'         => config('site.meta.og_image'),
        ];
        return view('front_end.desktop.video.detail', compact(
            'meta',
            'video',
            'postSideBar'
        ));
    }

    /**
     * get video page
     * @return view
     */
    public function videoPage(Request $request)
    {
        
    }
}
