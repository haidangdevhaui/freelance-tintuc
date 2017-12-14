<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\ProfileRequest;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends AdminController
{
    public $admin;

    public $role;

    public function __construct(){
        parent::__construct();

    }

    public function getViewProfile() {
    	return view('admin.profile.view');
    }
    public function getEditProfile() {
    	return view('admin.profile.edit');
    }
    public function putEditProfile(ProfileRequest $request) {
        if($request->isMethod('PUT')) {
        	$users = Auth::user();
        	$users->name = $request->get('name');
        	$users->email = $request->get('email');
        	if($request->hasFile('images')) {
        		$file_name = $request->file('images')->getClientOriginalName();
        		$path = "Uploads/admin/";
        		if($request->file('images')->move($path, $file_name)) {
        			$users->images = $path.$file_name;
        		}
        	}
        	if($users->save()) {
        		return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Bạn đã thay đổi thông tin thành công']);
        	}
        }
    }

    public function putChangePassword(Request $req){
        if(!Hash::check($req->password, $this->admin->password)){
            return redirect()->back()->with(['flash_level'=>'danger', 'flash_message'=>'Mật khẩu không đúng']);
        }
        $this->admin->password = Hash::make($req->new_password);
        $this->admin->save();
        return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Đổi mật khẩu thành công']);
    }
}