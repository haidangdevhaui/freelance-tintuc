<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DesktopController extends Controller
{

    public function __construct(Category $category, Request $request)
    {
        if ($request->isMethod('GET')) {
            $menu       = $category->getForMenu();
            $postHot    = $this->post->getHot();
            $menuActive = str_replace('.', '-', $request->route()->getName());
            view()->share(compact('menu', 'postHot', 'menuActive'));
        }
    }
}
