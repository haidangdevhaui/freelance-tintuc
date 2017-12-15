<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Categories;
use App\Entities\User_category;
use App\Entities\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionModeratorRequest;
use Auth;

class ManageModeratorController extends Controller {
	public function __construct() {
		if (Auth::check()) {
			$user_login = Auth::user();
			$roleSet = $user_login->role->first();
			view()->share(['roleSet' => $roleSet]);
		}
	}
	public function getListPermisionModerator() {
		if(Auth::check()) {
			$user = Auth::user();
			$roles = Roles::where('name', 'Moderator')->first();
			$user_moderator = $roles->user;
			$user_collect = $user_moderator->map(function($item, $key){
				$item->cates = $item->category;
				return $item;
			});
		    return view('admin.manage_moderator.list', compact('user_collect'));
		}

	}
	public function getAddPermisionModerator() {
		if (Auth::check()) {
			$rolesModerator = Roles::where('name', 'Moderator')->first();
			$userModerator = $rolesModerator->user;
			$cat_users = Categories::orderBy('id', 'desc')->get();
			return view('admin.manage_moderator.add', compact('userModerator', 'cat_users'));
		}
	}
	public function postAddPermisionModerator(PermissionModeratorRequest $request) {
		if ($request->isMethod('post')) {
			$selectCat = User_category::all();
			foreach ($request->select_category as $onlySelectCat) {
				$userCategory = new User_category;
				$userCategory->user_id = $request->select_moderator;
				$userCategory->category_id = $onlySelectCat;
			    $userCategory->save();
			}
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã gán quyền sở hũu chuyên mục cho moderator thành công']);

		}
	}
}
