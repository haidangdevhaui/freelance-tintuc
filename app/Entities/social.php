<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $table = 'social';
    protected $fillable = ['link_fb', '	link_google', 'link_rss'];
    public $timestamps = false;
}
