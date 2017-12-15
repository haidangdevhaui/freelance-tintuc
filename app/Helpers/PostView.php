<?php

namespace App\Helpers;
use Session;

class PostView {

	public static function isViewed($postID){
		if(!Session::has('PostView')){
			Session::put('PostView', []);
		}
		$arr = Session::get('PostView');
		if(in_array($postID, $arr)) return true;
		array_push($arr, $postID);
		Session::put('PostView', $arr);
		return false;
	}

}