<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";
    protected $fillable = ['title', 'description', 'images', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Entities\Categories');
    }

    public static function getSlider(){
    	$slider = Slider::select('title', 'slug', 'description', 'images')->where('status', 1)->get();
    	return $slider;
    }
}
