<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TimerPost extends Model
{
    protected $table = "timer_post";
    protected $fillable = ['title', 'timer_post'];
    public function post() {
    	return $this->belongsTo('App\Entities\Posts', 'post_id');
    }
}
