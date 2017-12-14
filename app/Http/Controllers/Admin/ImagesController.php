<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Gallery;
use App\Entities\Posts;
use App\Http\Controllers\AdminController;
use App\Http\Requests\ImagesRequest;
use Auth;

class ImagesController extends AdminController {

	public $admin;

	public $role;

	public function __construct() {

		parent::__construct();
		if(!in_array($this->role, [1,2,3])){
			\Redirect::to('/admin')->send();
		}

	}

	public function getList() {
		$images = [];
		return view('admin.images.list', compact('images'));
	}
	public function getListGallery() {
		$img_gallery = Gallery::orderBy('id', 'desc')->get();
		return view('admin.images.list_gallery', compact('img_gallery'));
	}
	public function getAdd() {
		return view('admin.images.add');
	}
	public function postAdd(ImagesRequest $request) {
		$data = $request->file('input44');
		foreach ($data as $data_val) {
			$gallery = new Gallery;
			$file_name = $data_val->getClientOriginalName();
			$gallery->images = $file_name;
			$path = "Uploads/Gallery/";
			if ($data_val->move($path, $file_name)) {
				$gallery->save();
			}
		}
		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã tải tập tin nên thư viện thành công ']);
	}
}
