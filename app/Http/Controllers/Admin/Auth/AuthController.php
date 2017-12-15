<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Entities\Roles;
use App\Entities\User;
use App\Entities\role_user;
use App\Http\Controllers\AdminController;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ModeratorRequest;
use App\Http\Requests\RequestEditAdmin;
use Auth, Hash;

class AuthController extends AdminController {

	public $admin;

	public $role;

	public function __construct() {
		parent::__construct();
		if($this->role != 1){
			\Redirect::to('/admin')->send();
		}
	}
	public function getListAdminAccount() {
		
		$admins = User::all();

		return view('admin.admin_account.list', compact('admins'));
	}
	public function getListModeratorAccount() {
		$listUsers = User::all();
		foreach ($listUsers as $listUser) {
			$roles = $listUser->role;
			foreach ($roles as $role) {
				if ($role->name == 'Moderator' && $role->level == 1) {
					$UserFilter = $role->user;
				}
			}
		}
		return view('admin.moderator_account.list', compact('UserFilter'));
	}
	public function getAddAdminAccount() {
		return view('admin.admin_account.add');
	}
	public function postAddAdminAccount(AdminRequest $request) {
		if ($request->isMethod('post')) {
			$users = new User;
			$users->name = $request->get('name');
			$users->email = $request->get('email');
			$users->role = $request->get('role');
			$users->password = Hash::make($request->get('password'));
			$users->remember_token = $request->get('_token');
			if ($request->checkbox == "on") {
				$users->status = 1;
			} else {
				$users->status = 0;
			}
			if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = "Uploads/admin/";
				if ($request->file('images')->move($path, $file_name)) {
					$users->images = $file_name;
				}
			}
			if ($users->save()) {
				$role_user = new role_user;
				$role_user->role_id = 2;
				$role_user->user_id = $users->id;
				if ($role_user->save()) {
					return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm tài khoản admin thành công ']);
				}
			}
		}
	}
	public function deleteAdminAccount($id) {
		$AdminAccount = User::find($id);
		if ($AdminAccount->delete()) {
			return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã xoá tài khoản admin thành công ']);
		}
	}
	public function getAddModeratorAccount() {
		return view('admin.moderator_account.add');
	}
	public function postAddModeratorAccount(ModeratorRequest $request) {
		if ($request->isMethod('post')) {
			$users = new User;
			$users->name = $request->get('name');
			$users->email = $request->get('email');
			$users = new User;
			$users->name = $request->get('name');
			$users->email = $request->get('email');
			$users->role = $request->get('role');
			$users->password = Hash::make($request->get('password'));
			$users->remember_token = $request->get('_token');
			if ($request->checkbox == "on") {
				$users->status = 1;
			} else {
				$users->status = 0;
			}
			if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = "Uploads/admin/";
				if ($request->file('images')->move($path, $file_name)) {
					$users->images = $file_name;
				}
			}
			if ($users->save()) {
				$role_user = new role_user;
				$role_user->role_id = 3;
				$role_user->user_id = $users->id;
				if ($role_user->save()) {
					return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã thêm tài khoản admin thành công ']);
				}
			}
		}
	}
	public function deleteModeratorAccount($id) {
		$userAccount = User::find($id);
		if ($userAccount->delete()) {
            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã xoas tài khoản user thành công ']);
		}
	}
	public function getEditAdminAccount($id) {
		$admin_info = User::find($id);
		if(isset($admin_info)) {
		    return view('admin.admin_account.edit', compact('admin_info'));
		}
	}
	public function putEditAdminAccount(RequestEditAdmin $request, $id) {
        if($request->isMethod('PUT')) {
        	$users = User::find($id);
        	$users->name = $request->get('name');
        	$users->email = $request->get('email');
        	$users->role = $request->get('role');
        	$users->password = Hash::make($request->get('password'));
        	if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = "Uploads/admin/";
				if ($request->file('images')->move($path, $file_name)) {
					$users->images = $file_name;
				}
			}
			if($request->get('checkbox') == 'on') {
				$users->status = 1;
			} else {
				$users->status = 0;
			}
        	
        	if($users->save()) {
        		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã sửa thành công']);
        	}
        }
	}
	public function getViewAdminAccount($id) {
		$admin_info = User::find($id);
		$roles_all = Roles::all();
		$roles = $admin_info->role->first();
		if(isset($admin_info)) {
		    return view('admin.admin_account.view', compact('admin_info', 'roles_all', 'roles'));
		}
	}
	public function getEditModeratorAccount($id) {
		$admin_info = User::find($id);
		$roles_all = Roles::where('level','<>', 3)->get();
		$roles = $admin_info->role->first();
        return view('admin.moderator_account.edit', compact('admin_info', 'roles_all', 'roles'));
	}
	public function putEditModeratorAccount(RequestEditAdmin $request, $id) {
        if($request->isMethod('PUT')) {
        	$users = User::find($id);
        	$users->name = $request->get('name');
        	$users->email = $request->get('email');
        	$users->role = $request->get('role');
        	if ($request->hasFile('images')) {
				$file_name = $request->file('images')->getClientOriginalName();
				$path = "Uploads/admin/";
				if ($request->file('images')->move($path, $file_name)) {
					$users->images = $file_name;
				}
			}
			if($request->get('checkbox') == 'on') {
				$users->status = 1;
			} else {
				$users->status = 0;
			}
        	$role_user = role_user::where('user_id', $id)->first();
        	$role_user->role_id = $request->get('role_user');
        	if($users->save() && $role_user->save()) {
        		return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Bạn đã sửa thành công']);
        	}
        }
	}
	public function getViewModeratorAccount($id) {
		$admin_info = User::find($id);
		$roles_all = Roles::all();
		$roles = $admin_info->role->first();
		if(isset($admin_info)) {
		    return view('admin.moderator_account.view', compact('admin_info', 'roles_all', 'roles'));
		}
	}
}
