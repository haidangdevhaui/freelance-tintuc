<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use Request;

class MobileController extends Controller{

	public function __construct(){
		$menu = config('menu_mobile');
		view()->share([
			'menu' => $menu
		]);
		$agent = new Agent();
		$path = Request::getPathInfo();
		if($agent->isTablet() || $agent->isDesktop()){
			return redirect(url(str_replace('/mobile', '', $path)))->send();
		}
	}
}