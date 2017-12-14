<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Jenssegers\Agent\Agent;

class DesktopController extends Controller{

	public function __construct(Category $category){

		$categories = $category->getForMenu();

		// $hot = Posts::getPostHot();
		// view()->share([
		// 	'menu' => $menu,
		// 	'hot_footer' => $hot,
		// ]);
		// $agent = new Agent();
		// $path = Request::getPathInfo();
		// if($agent->isMobile()){
		// 	if(!$agent->is('IPad')){
		// 		return redirect(url('mobile'.$path))->send();
		// 	}
		// }
	}
}