<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Categories;
use App\Entities\Posts;
use App\Entities\Tag;
use App\Entities\Tag_post;
use App\Http\Controllers\AdminController;
use App\Http\Requests\VideoRequest;
use Auth;
use File;

class VideoController extends AdminController {

	public $admin;

	public $role;

	public function __construct() {

		parent::__construct();
		if(!in_array($this->role, [1,2,3])){
			\Redirect::to('/admin')->send();
		}

	}

	public function getListVideo() {
		$videos = Posts::select('id', 'name', 'images', 'status')->where('post_type', 'video')->orderBy('id', 'desc');

		if($this->role == 2){
			$videos->where('user_id', $this->admin->id);
		}

		$videos = $videos->paginate(20);

		return view('admin.video.list', compact('videos'));
	}

	public function getAddVideo() {
		return view('admin.video.add');
	}

	public function postAddVideo(videoRequest $request) {
		if ($request->isMethod('post')) {
			if (Auth::check()) {
				$users = Auth::user();
				$video = new Posts;
				$video->name = $request->name;
				$video->slug = str_slug($request->slug, '-');
				$video->description = $request->get('description');
				$video->content = $request->get('content');
				$video->meta_title = $request->get('meta_title');
				$video->meta_keyword = $request->get('meta_keyword');
				$video->meta_description = $request->get('meta_description');
				$cate_id = Categories::where('type', 'video')->first();
				if(isset($cate_id->id)) {
					$video->category_id = $cate_id->id;
				} else {
					$video->category_id = 0;
				}
				$video->user_id = $users->id;
				$video->post_type = 'video';
				if ($request->checkbox == "on") {
					$video->status = 1;
				} else {
					$video->status = 0;
				}
				$get_link = $request->get('url');
				$frame_youtube = "https://www.youtube.com/watch?v=";
				if (strpos($get_link, $frame_youtube) !== false) {
					$end_rename = explode($frame_youtube, $get_link);
					$end_mv_name = end($end_rename);
					$video->url = $end_mv_name;
				} else {
					return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Đường link không hợp lệ']);
				}
				if ($request->hasFile('images')) {
					$file = $request->file('images');
					$file_name = $file->getClientOriginalName();
					$file_extension = $file->getClientOriginalExtension();
                    $file_photo = 'video_'.(md5($file_name)).uniqid().'.'.$file_extension;
					$path = 'Uploads/Video/';
					if ($file->move($path, $file_photo)) {
						$video->images = $file_photo;
					}
				}
				if ($video->save()) {
					if (!empty($request->get('tag_news'))) {
						$post_id = $video->id;
						$tag_name = $request->get('tag_news');
						$tag_name_array = explode(',', $tag_name);
						foreach ($tag_name_array as $tag_name_item) {
							$tags = new Tag;
							$tags->name = $tag_name_item;
                            $tags->slug = str_slug($tag_name_item);
							if ($tags->save()) {
								$tag_id = $tags->id;
								$tag_posts = new Tag_post;
								$tag_posts->post_id = $post_id;
								$tag_posts->tag_id = $tag_id;
								$tag_posts->save();
							}
						}
					}
					return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm video thành
                    công', ]);
				}
			}
		}
	}

	public function deleteVideo($id) {
		$video = Posts::find($id);
		$file_path = public_path()."/Uploads/Video/".$video->images;
        File::delete($file_path);
		if ($video->delete()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_mesage' => 'Bạn đã xoá video thành công ']);
		}
	}

	public function getEditVideo($id) {
		$video = Posts::where('id', $id)->get();
		$video_collect = $video->map(function ($item, $key) {
			$item->cates = $item->category;
			$url_video = $item->url;
			$url_frame = "https://www.youtube.com/watch?v=";
			$url_full = $url_frame . $url_video;
			$item->url = $url_full;
			if (!empty($item->tags)) {
				$tagss = $item->tags->toArray();
				$tagssss_array = [];
				foreach ($tagss as $tagsss) {
					$tagssss_array[] = $tagsss['name'];
				}
				$tagsss = implode(',', $tagssss_array);
				$item->tags = $tagsss;
			}
			return $item;
		});
		return view('admin.video.edit', compact('video_collect'));
	}

	public function PutEditVideo(videoRequest $request, $id) {
		if (Auth::check()) {
			if ($request->isMethod('PUT')) {
				$users = Auth::user();
				$video = Posts::find($id);
				$video->name = $request->get('name');
				$video->slug = str_slug($request->get('slug'));
				$video->description = $request->get('description');
				$video->content = $request->get('content');
				$video->meta_title = $request->get('meta_title');
				$video->meta_keyword = $request->get('meta_keyword');
				$video->meta_description = $request->get('meta_description');
				$cate_id = Categories::where('type', 'video')->first();
				$video->category_id = $cate_id->id;
				$video->user_id = $users->id;

				$get_link = $request->get('url');
				$frame_youtube = "https://www.youtube.com/watch?v=";
				if (strpos($get_link, $frame_youtube) !== false) {
					$end_rename = explode($frame_youtube, $get_link);
					$end_mv_name = end($end_rename);
					$video->url = $end_mv_name;
				} else {
					return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Đường link không hợp lệ']);
				}
				if ($request->checkbox == "on") {
					$video->status = 1;
				} else {
					$video->status = 0;
				}
				if ($request->hasFile('images')) {
					$file_path = public_path()."/Uploads/Video/".$video->images;
		            File::delete($file_path);
		            $file = $request->file('images');
					$file_name = $request->file('images')->getClientOriginalName();
					$file_extension = $file->getClientOriginalExtension();
                    $file_photo = 'video'.(md5($file_name)).uniqid().'.'.$file_extension;
					$path = "Uploads/Video/";
					if ($file->move($path, $file_photo)) {
						$video->images = $file_photo;
					}
				}
				if ($video->save()) {
					$tag_current = $video->tags;
					foreach ($tag_current as $tag_current_val) {
						$tag_current_val->delete();
					}
					if (!empty($request->get('tag_news'))) {
						$post_id = $video->id;
						$tag_name = $request->get('tag_news');
						$tag_name_array = explode(',', $tag_name);
						foreach ($tag_name_array as $tag_name_item) {
							$tags = new Tag;
                            $tags->name = $tag_name_item;
							$tags->slug = str_slug($tag_name_item);
							if ($tags->save()) {
								$tag_id = $tags->id;
								$tag_posts = new Tag_post;
								$tag_posts->post_id = $post_id;
								$tag_posts->tag_id = $tag_id;
								$tag_posts->save();
							}
						}
					}
					return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã sửa video thành công']);
				}
			}
		}
	}

	public function getViewVideo($id) {
		$video = Posts::where('id', $id)->get();
		$video_collect = $video->map(function ($item, $key) {
            $item->cates = $item->category;
            $url_video = $item->url;
            $url_frame = "https://www.youtube.com/watch?v=";
            $url_full = $url_frame . $url_video;
            $item->url = $url_full;
            if (!empty($item->tags)) {
                $tagss = $item->tags->toArray();
                $tagssss_array = [];
                foreach ($tagss as $tagsss) {
                    $tagssss_array[] = $tagsss['name'];
                }
                $tagsss = implode(',', $tagssss_array);
                $item->tags = $tagsss;
            }
            return $item;
        });
		return view('admin.video.view', compact('video_collect'));
	}
}
