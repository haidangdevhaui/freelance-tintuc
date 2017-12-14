<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Categories;
use App\Entities\Post_type;
use App\Entities\Posts;
use App\Entities\Tag;
use App\Entities\Tag_post;
use App\Http\Controllers\AdminController;
use App\Http\Requests\SliderRequest;
use Auth;

class SliderController extends AdminController {

	public $admin;
	public $role;

	public function __construct() {
		parent::__construct();
		if (!in_array($this->role, [1, 2])) {
			//
			\Redirect::to('/admin')->send();
		}
	}

	public function getListSlider() {

		$sliders = Posts::join('categories as c', 'posts.category_id', '=', 'c.id')
						->select(
								'posts.id', 'posts.name', 'posts.author', 'posts.images', 'posts.status', 'posts.views', 'c.name as category_name'
						)
						->where('posts.post_type', 'slider')->get();

		return view('admin.slider.list', compact('sliders'));
	}

	public function getAddSlider() {
		return view('admin.slider.add');
	}

	public function postAddSlider(SliderRequest $request) {
		if ($request->isMethod('post')) {
			$users = Auth::user();
			$sliders = new Posts;
			$sliders->name = $request->input('name');
			$sliders->slug = str_slug($request->input('slug'));
			$sliders->description = $request->input('description');
			$sliders->content = $request->input('content');
			$sliders->meta_title = $request->input('meta_title');
			$sliders->meta_keyword = $request->input('meta_keyword');
			$sliders->meta_description = $request->input('meta_description');
			$sliders->category_id = $request->input('parent_category');
			$sliders->post_type = 'slider';
			$cat_id = Categories::where('type', 'slider')->first();
			$sliders->category_id = $cat_id->id;
			$sliders->user_id = $users->id;
			if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = 'Uploads/Slider/';
				if ($request->file('images')->move($path, $file_name)) {
					$sliders->images = $file_name;
				}
			}
			if ($request->get('checkbox') == 'on') {
				$sliders->status = 1;
			} else {
				$sliders->status = 0;
			}
			if ($sliders->save()) {
				if (!empty($request->get('tag_news'))) {
					$post_id = $sliders->id;
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
				return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm slider thành công']);
			}
		}
	}

	public function deleteSlider($id) {
		$slider = Posts::find($id);
		if ($slider->delete()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã xóa thành công']);
		}
	}

	public function getEditSlider($id) {
		$sliders = Posts::where('id', $id)->get();
		$cats_list = categories::all();
		$slider_collect = $sliders->map(function ($item, $key) {
			$item->cates = $item->category;
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
		// dd($slider_collect);
		return view('admin.slider.edit', compact('slider_collect', 'sliders', 'cats_list'));
	}

	public function postEditSlider(SliderRequest $request, $id) {
		if ($request->isMethod('PUT')) {
			$sliders = Posts::find($id);
			$sliders->name = $request->get('name');
			$sliders->slug = str_slug($request->get('slug'));
			$sliders->description = $request->get('description');
			$sliders->content = $request->get('content');
			$sliders->meta_title = $request->get('meta_title');
			$sliders->meta_keyword = $request->get('meta_keyword');
			$sliders->meta_description = $request->get('meta_description');
			$cat_id = Categories::where('type', 'video')->get()->first();
			$sliders->category_id = $cat_id->id;
			if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = "Uploads/Slider/";
				if ($request->file('images')->move($path, $file_name)) {
					$sliders->images = $file_name;
				}
			}
			if ($request->checkbox == 'on') {
				$sliders->status = 1;
			} else {
				$sliders->status = 0;
			}
			// dd($request->get('tag_news'));
			if ($sliders->save()) {
				$tag_current = $sliders->tags;
				foreach ($tag_current as $tag_current_val) {
					$tag_current_val->delete();
				}
				if (!empty($request->get('tag_news'))) {
					$post_id = $sliders->id;
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
				return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn cập nhật  thành công slider ']);
			}
		}
	}

	public function getViewSlider($id) {
		$sliders = Posts::where('id', $id)->get();
		$cats_list = categories::all();
		$slider_collect = $sliders->map(function ($item, $key) {
			$item->cates = $item->category;
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
		return view('admin.slider.view', compact('slider_collect', 'sliders', 'cats_list'));
	}

}
