<?php

namespace App\Http\Controllers\Admin;

use App\Entities\social;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use Illuminate\Http\Request;
use Auth;

class SocialController extends Controller
{
    public function getEditSocial(){
    	$social = social::first();
    	return view('admin.social.index', compact('social'));
    }
    public function putEditSocial(SocialRequest $request) {
    	if(Auth::check()) {
	    	if($request->isMethod('PUT')) {
	    		$social = social::first();
	    		$social->link_fb = $request->input('link_fb');
	    		$social->link_google = $request->input('link_google');
	    		$social->link_rss = $request->input('link_rss');
	    		if($social->save()) {
	    			return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Bạn đã cập nhật link mạng xã hội thành công']);
	    		}
	    	}
	    }
    }
}
