<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use DB;
use Jenssegers\Agent\Agent;

class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['name', 'url', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Entities\Categories');
    }

    public function scopeGetAds($query){
        $data = $query->get();
        if(count($data) == 0){
            return $query->get();
        }
        $result = [];
        foreach ($data as $key) {
            $result[$key->position][] = $key;
        }
        return $result;
    }

    public function scopeSelectAds($query){
        return $query->select('id', 'type', 'position', 'images', 'iframe', 'url')->where('status', 1)->where('screen', 0);
    }

    public static function getAdvInHome(){
    	return Advertisement::selectAds()->where('home', 1)->getAds();
    }

    public static function getAdsByCategory($cid){
        return Advertisement::selectAds()->where('category_id', $cid)->getAds();
    }

    public static function getAdsInPost(){
        return Advertisement::selectAds()->where('post', 1)->getAds();
    }

    public static function getAdsMobile(){
        return Advertisement::select('id', 'type', 'position', 'images', 'iframe', 'url', 'timer')
            ->where('status', 1)
            ->where('screen', 1)
            ->where('post', 1)
            ->getAds();
    }

    

    public static function whenClick($advId){
        $agent = new Agent;
        $data = [
            'adv_id' => $advId,
            'browser' => $agent->getUserAgent(),
            'device' => $agent->device(),
            'ip' => Advertisement::get_client_ip(),
            'created_at' => \Carbon\Carbon::now()
        ];
        return DB::table('adv_statist')->insert($data);
    }

    public static function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function getStatist($advId){
        return DB::table('adv_statist')->where('adv_id', $advId)->paginate(20);
    }
}
