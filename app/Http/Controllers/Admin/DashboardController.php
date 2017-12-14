<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\LoginAdminRequest;
use Auth;

class DashboardController extends AdminController {
	public $admin;
	public $role;

	public function __construct(){
		parent::__construct();
	}

	public function getLogin() {
		if (Auth::check()) {
			return redirect()->route('getDashboard');
		} else {
			return view('admin.login.login');
		}
	}

	public function postLogin(LoginAdminRequest $request) {
		if ($request->isMethod('post')) {
			$paramLogin = [
				'email' => $request->get('email'),
				'password' => $request->get('password'),
			];
			if (Auth::guard('admin')->attempt($paramLogin)) {
				return redirect()->route('getDashboard');
			} else {
				return redirect()->back();
			}
		}
	}

	public function getDashboard() {
		return view('admin.home.dashboard', compact('countPost'));
	}
}
