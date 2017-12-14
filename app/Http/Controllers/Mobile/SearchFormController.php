<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Posts;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;

class SearchFormController extends MobileController
{
    public function getSearchFormMb(Request $request) {
    	if($request->isMethod('get')) {
            $search = $request->get('search_form_mb');
            if(!empty($search)) {
            	$result_search = Posts::where('status', 1)->where("name", "like", "%$search%")->orWhere("description", "like", "%$search%")->orWhere("content", "like", "%$search%")->paginate(10);
            	return view('front_end.mobile.search_form.result', compact('result_search', 'search'));
            }else {
            	$result_search = null; 
            	return view('front_end.mobile.search_form.result', compact('result_search', 'search'));
            }
    	}
    }
}
