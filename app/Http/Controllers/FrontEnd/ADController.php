<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Advertisement as AD;

class ADController extends Controller
{
    public function click($adId){
    	$adv = AD::find($adId);
    	if(!$adv){
    		return redirect(url('/'));
    	}
    	AD::whenClick($adId);
    	$adv->click = $adv->click + 1;
    	$adv->save();
    	return redirect()->to($adv->url);
    }
}
