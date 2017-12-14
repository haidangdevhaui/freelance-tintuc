<?php

namespace App\Http\Controllers\Mobile;

use App\Entities\Posts;
use App\Http\Controllers\MobileController;
use Illuminate\Http\Request;

class PaginateLoadController extends MobileController
{
    public function getPaginateLoadMb(Request $request) {
    	$data_pn = $request->get('ok');
    	$record_per_page = $request->get('record_per_page');
    	$page = $request->get('page');
    	$cat_id = $request->get('id');
    	$num_page_load = $page*$record_per_page;
    	$posts = Posts::where('category_id', $cat_id)->where('status', 1)->orderBy('id', 'desc')->skip($num_page_load - 2)->take($record_per_page)->get();
    	return $posts;
    }
}
