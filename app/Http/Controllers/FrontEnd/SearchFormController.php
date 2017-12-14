<?php

namespace App\Http\Controllers\FrontEnd;

use App\Entities\Posts;
use App\Http\Controllers\FrontEnd\PostsDetailController;
use Illuminate\Http\Request;

class SearchFormController extends PostsDetailController
{
    public function getSearchForm(Request $request) {
    	if($request->isMethod('get')) {
            $search = $request->get('search_form');
            if(!empty($search)) {
            	$result_search = Posts::where("name", "like", "%$search%")->orWhere("description", "like", "%$search%")->orWhere("content", "like", "%$search%")->paginate(10);
            	return view('front_end.desktop.search_form.result', compact('result_search', 'search'));
            }else {
            	$result_search = '';
                return view('front_end.desktop.search_form.result', compact('result_search', 'search'));
            }
    	}
    }
}
