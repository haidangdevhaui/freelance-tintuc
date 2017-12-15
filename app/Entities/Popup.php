<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\PopupMapper;

class Popup extends Model
{
    public static function getHomePopup(){
    	$popup = Popup::select('content', 'hidden_time', 'type')->where('in_home', 1)->where('status', 1)->orderBy('updated_at', 'desc')->first();
    	return $popup;
    }

    public static function getDetailPopup(){
    	$popup = Popup::select('content', 'hidden_time', 'type')->where('in_detail', 1)->where('status', 1)->orderBy('updated_at', 'desc')->first();
    	return $popup;
    }

    public static function getSubCatePopup($categoryID){
    	$popup = Popup::join('popup_mappers as m', 'popups.id', '=', 'm.popup_id')
    		->where('m.category_id', $categoryID)
    		->where('popups.status', 1)
    		->orderBy('popups.updated_at', 'desc')
    		->first();
    	if($popup){
    		return $popup;
    	}
    	$popup = Popup::where('in_sub_cate', 1)
    		->where('status', 1)
    		->orderBy('updated_at', 'desc')
    		->first();
    	return $popup;
    }

    public static function getCatePopup($categoryID){
    	$popup = Popup::join('popup_mappers as m', 'popups.id', '=', 'm.popup_id')
    		->where('m.category_id', $categoryID)
    		->where('popups.status', 1)
    		->orderBy('popups.updated_at', 'desc')
    		->first();
    	if($popup){
    		return $popup;
    	}
    	$popup = Popup::where('in_cate', 1)
    		->where('status', 1)
    		->orderBy('updated_at', 'desc')
    		->first();
    	return $popup;
    }
}
