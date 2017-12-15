<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";
    protected $fillable = ['title', 'images', 'url', 'category_id'];
    public function category() {
        return $this->belongsTo('App\Entities\Categories');
    }
}
