<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post_view extends Model
{
    protected $table = 'post_view';
    protected $fillable = ['count_view', 'ip', 'post_id'];
}
