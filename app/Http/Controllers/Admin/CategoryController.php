<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Categories;
use App\Entities\Post_type;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Auth;

class CategoryController extends Controller {
	public function __construct() {
		$cates = Categories::where('type', 'news')->get();
		$typePost = Post_type::all();
		$countCat = count($cates->toArray());
		view()->share(['countCat' => $countCat, 'typePost' => $typePost, 'cates' => $cates]);
		if (Auth::check()) {
			$user_login = Auth::user();
			$roleSet = $user_login->role->first();
			view()->share(['roleSet' => $roleSet]);
		}
	}

	public function getListCategory() {
		$cates = Categories::all();
		$cate_collect = $cates->map(function ($item, $key) {
			$item->cate_parent = categories::where('id', $item->parent_id)->get();
			return $item;
		});
		return view('admin.categories.list', compact('cates', 'cate_collect'));
	}

	public function getAddCategory() {
		return view('admin.categories.add');
	}

	public function postAddCategory(CategoryRequest $request) {
		$cats = new categories;
		$cats->name = $request->name;
		$cats->slug = str_slug($request->slug, '-');
		$cats->position = $request->position;
		if(!empty($request->parent_category)) {
			$cats->parent_id = $request->parent_category;
		} else {
			$cats->parent_id = 0;
		}
		$cats->type = $request->type;
		$cats->meta_title = $request->meta_title;
		$cats->meta_keyword = $request->meta_keyword;
		$cats->meta_description = $request->meta_description;
		$cats->color = $request->get('color');
		if ($cats->save()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm chuyên mục thành công ']);
		}
	}

	public function deleteCategory($id) {
		$cats = Categories::find($id);
		if ($cats->delete()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã xoá chuyên mục bài viết thành công ']);
		}
	}

	public function getEditCategory($id) {
		$cats = Categories::all();
		$cat_find = Categories::find($id);
		return view('admin.categories.edit', compact('cats', 'cat_find'));
	}
	public function postEditCategory(CategoryRequest $request, $id) {
		$cats = categories::find($id);
		$cats->name = $request->name;
		$cats->slug = $request->slug;
		$cats->meta_title = $request->meta_title;
        $cats->meta_keyword = $request->meta_keyword;
		$cats->meta_description = $request->meta_description;
        $cats->type = $request->type;
		$cats->position = $request->position;
		if(!empty($request->parent_category)) {
			$cats->parent_id = $request->parent_category;
		} else {
			$cats->parent_id = 0;
		}
		$cats->color = $request->get('color');
        if($request->get('checkbox') == "on") {
            $cats->status = 1;
        } else {
            $cats->status = 0;
        }
		if ($cats->save()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã cập nhật chuyên mục bài viết thành công ']);
		}
	}
    public function getViewCategory($id) {
        $cats = Categories::all();
        $cat_find = Categories::find($id);
        return view('admin.categories.view', compact('cats', 'cat_find'));
    }
}
