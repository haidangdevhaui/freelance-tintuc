<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\Post;
use Auth;
use File;use Illuminate\Http\Request;

class PostController extends AdminController
{

    public $admin;
    public $role;
    protected $filter;
    protected $search;

    public function __construct(Category $category, Post $post, Request $request)
    {
        parent::__construct();

        $this->category = $category;
        $this->post     = $post;

        $this->filter = ['author', 'title', 'created_by', 'category_id'];
        $this->search = 'posts.title';

        if ($request->isMethod('GET')) {
            $categories    = $this->category->getAll();
            $availableTags = '';
            view()->share(compact('categories', 'availableTags'));
        }
    }

    /**
     * list action
     * @param  Request $req
     * @return view
     */
    public function index(Request $req)
    {
        return view('admin.news.list', compact('filter'));
    }

    /**
     * create action
     * @param  NewsRequest $request
     * @param  integer|NULL      $id
     * @return view|redirect
     */
    public function create(NewsRequest $request, $id = null)
    {
        if ($request->isMethod('GET')) {
            if ($id) {
                $post = $this->post->find($id);
            }
            return view('admin.news.add', compact('post'));
        }

        $data = $request->except(['_token', 'tag_news', 'tagsData']);
        try {
            if (isset($data['is_slider'])) {
                $data['type'] = Post::TYPE_SLIDER;
                unset($data['is_slider']);
            }
            if (isset($data['is_hot'])) {
                $data['is_hot'] = Post::IS_HOT;
            }
            if (isset($data['is_high'])) {
                $data['is_high'] = Post::IS_HIGH;
            }
            if (isset($data['is_right'])) {
                $data['is_right'] = Post::IS_HIGH;
            }
            $data['created_by'] = $this->admin->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = $data['created_at'];

            if ($request->hasFile('image')) {
                $file           = $request->file('image');
                $file_name      = $request->file('image')->getClientOriginalName();
                $file_extension = $file->getClientOriginalExtension();
                $file_photo     = \Carbon\Carbon::now()->timestamp . '.' . $file_extension;
                $path           = "uploads/";
                if ($file->move($path, $file_photo)) {
                    $data['image'] = $path . $file_photo;
                }
            }

            if ($id) {
                $this->post->where(['id' => $id])->update($data);
            } else {
                $this->post->insert($data);
            }

            return redirect()->route('post_index')->with(['message' => 'Thêm bài viết thành công']);
        } catch (Exception $e) {
            if (file_exists($data['image'])) {
                unlink($data['image']);
            }
            throw $e;
            return redirect()->back()->withErrors(['error' => 'Không thể tạo bài viết.']);
        }
    }

    /**
     * delete post
     * @param  integer $id
     * @return redirect
     */
    public function delete($id)
    {
        $post = $this->post->findOrFail($id);
        if (file_exists($post->image)) {
            File::delete($post->image);
        }
        if ($post->forceDelete()) {
            return redirect()->back()->with(['message' => 'Bạn đã xoá thành công
            bài viết tin tức ']);
        }
    }

    public function getAddTimerNews()
    {
        $timer = 1;
        return view('admin.news.add', compact('timer'));
    }

    public function postAddNews(NewsRequest $request)
    {
        if (Auth::check()) {
            if ($request->isMethod('post')) {
                $user                    = Auth::user();
                $posts                   = new Posts;
                $posts->name             = $request->get('name');
                $posts->slug             = str_slug($request->get('slug'), '-');
                $posts->description      = $request->get('description');
                $posts->content          = $request->get('content');
                $posts->category_id      = $request->get('category_id');
                $posts->meta_title       = $request->get('meta_title');
                $posts->meta_keyword     = $request->get('meta_keyword');
                $posts->meta_description = $request->get('meta_description');
                $posts->author           = $request->get('author');
                $posts->source           = $request->get('source');

                //$request->get('created_at') ? $posts->created_at = $request->get('created_at') : '';
                $posts->created_at = \Carbon\Carbon::now();
                $posts->user_id    = $user->id;
                $posts->connect    = $request->get('connect');

                if ($request->get('show_slider') == 'on') {
                    $posts->post_type = 'slider';
                }
                if ($request->get('is_right') == 'on') {
                    $posts->is_right = 1;
                } else {
                    $posts->is_right = 0;
                }
                if ($request->get('is_care') == 'on') {
                    $posts->is_care = 1;
                } else {
                    $posts->is_care = 0;
                }
                if ($request->get('news_juicy') == "on") {
                    $posts->hot = 1;
                } else {
                    $posts->hot = 0;
                }
                if ($request->get('is_landing') == "on") {
                    $posts->is_landing = 1;
                } else {
                    $posts->is_landing = 0;
                }
                if ($request->get('news_highlights') == "on") {
                    $posts->hightlights = 1;
                } else {
                    $posts->hightlights = 0;
                }

                if ($request->timer) {
                    $posts->timer = $request->timer;
                }

                $posts->fixed_type     = $request->fixed_type;
                $posts->fixed_position = $request->fixed_position;

                if ($request->hasFile('images')) {
                    $file           = $request->file('images');
                    $file_name      = $request->file('images')->getClientOriginalName();
                    $file_extension = $file->getClientOriginalExtension();
                    $file_photo     = \Carbon\Carbon::now()->timestamp . '.' . $file_extension;
                    $path           = "Uploads/News/";
                    if ($file->move($path, $file_photo)) {
                        $posts->images = "Uploads/News/" . $file_photo;
                    }
                }
                if ($request->get('checkbox') == "on") {
                    $posts->status = 1;
                } else {
                    $posts->status = 0;
                }

                $posts->updated_at = \Carbon\Carbon::now();
                if ($posts->save()) {
                    $tags   = json_decode($request->tagsData);
                    $tagMap = [];
                    foreach ($tags as $key) {
                        array_push($tagMap, [
                            'post_id' => $posts->id,
                            'tag_id'  => $key->id,
                        ]);
                    }
                    Tag::createMap($tagMap);
                    return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm bài viết thành công']);
                }
            }
        }
    }

    public function convertJSON($json)
    {
        $jStr = '[';
        foreach ($json as $key => $value) {
            $jStr .= '{"name" : "' . $value['name'] . '", "link" : "' . $value['link'] . '"}, ';
        }
        $jStr = substr($jStr, 0, strlen($jStr) - 2) . ']';
        return $jStr;
    }

    public function getNewsByTag(Request $req)
    {
        $posts = Posts::select('id', 'name', 'slug')
            ->where('status', 1)
            ->where('name', 'LIKE', '%' . trim($req->term) . '%')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        $result = [];
        foreach ($posts as $key) {
            array_push($result, [
                'label' => $key->name,
                'value' => url($key->slug . '-' . $key->id . '.html'),
            ]);
        }
        return $result;
    }

    public function fetchNew(Request $request)
    {
        $req = $request->input();
        foreach ($req as $key => $value) {
            if (is_array($this->filter)) {
                if ((string) array_search($key, $this->filter) == '' || $req[$key] == '') {
                    unset($req[$key]);
                }
            } else {
                unset($req[$key]);
            }
        }
        unset($req['title']);
        $news  = $this->post->getForDataTable();
        $total = $news->count();
        $data  = $news->where($req);
        if (isset($this->search)) {
            $data = $data->where($this->search, 'LIKE', '%' . trim($request->name) . '%');
        }
        $data     = $data->orderBy('posts.id', 'desc');
        $filtered = $data->count();
        return response()->json([
            'draw'            => $request->draw,
            'recordsTotal'    => $total,
            'recordsFiltered' => $filtered,
            'data'            => $data->skip($request->start)->take($request->length)->get(),
        ]);
    }
}
