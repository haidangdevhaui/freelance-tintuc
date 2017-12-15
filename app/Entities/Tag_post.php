<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag_post extends Model
{
    protected $table = 'tag_posts';
    protected $fillable = ['post_id', 'tag_id'];
}
