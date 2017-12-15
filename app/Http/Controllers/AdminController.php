<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{

    public $admin;

    public $role;

    public function __construct()
    {
        if ($admin = Auth::guard('admin')->user()) {
        	$this->admin = $admin;
            view()->share(compact('admin'));
        }
    }
}
