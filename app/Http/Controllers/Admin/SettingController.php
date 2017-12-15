<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Config;
use App\Entities\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingDesktopRequest;
use App\Http\Requests\SettingGeneralRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getSettingDesktop(){
    	$setting = Setting::where('title', 'Desktop')->first();
    	return view('admin.setting.desktop', compact('setting'));
    }
    public function postSettingDesktop(SettingDesktopRequest $request) {
        if($request->isMethod('PUT')) {
        	$setting = Setting::where('title', 'Desktop')->first();
        	$setting->content = $request->get('content');
        	$setting->phone = $request->get('phone');
        	$setting->email = $request->get('email');
        	if($request->hasFile('images')) {
        		$file_name = $request->file('images')->getClientOriginalName();
        		$path = "Uploads/Setting/";
        		if($request->file('images')->move($path, $file_name)) {
        			$setting->images = $file_name;
        		}
        	}
        	if($setting->save()) {
        		return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Bạn đã cập nhật thành công cấu hình desktop']);
        	}
        }
    }
    public function getSettingMobile(){
    	$setting = Setting::where('title', 'Mobile')->first();
    	return view('admin.setting.mobile', compact('setting'));
    }
    public function postSettingMobile(SettingDesktopRequest $request) {
       if($request->isMethod('PUT')) {
        	$setting = Setting::where('title', 'Mobile')->first();
        	$setting->content = $request->get('content');
        	$setting->phone = $request->get('phone');
        	$setting->email = $request->get('email');
        	if($request->hasFile('images')) {
        		$file_name = $request->file('images')->getClientOriginalName();
        		$path = "Uploads/Setting/";
        		if($request->file('images')->move($path, $file_name)) {
        			$setting->images = $file_name;
        		}
        	}
        	if($setting->save()) {
        		return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Bạn đã cập nhật thành công cấu hình desktop']);
        	}
        }
    }
    public function getSettingGeneral() {
        $setting = Setting::where('title', 'general')->first();
        $configs = Config::first();
        return view('admin.setting.general', compact('setting', 'configs'));
    }
    public function putSettingGeneral(SettingGeneralRequest $request) {
        if($request->isMethod('PUT')) {
            $setting = Setting::where('title', 'general')->first();
            $setting->meta_title = $request->get('meta_title');
            $setting->meta_keyword = $request->get('meta_keyword');
            $setting->meta_description = $request->get('meta_description');
            $config = Config::first();
            if($request->get('maintenance') == 'on') {
                $config->maintenance = 1;
            }else {
                $config->maintenance = 0;
            }
            if($config->save()) {
                if($setting->save()) {
                    return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Bạn đã cập nhật thành công cấu hình chung']);
                }
            }
        }
    }
}
