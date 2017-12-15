<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
    protected $table    = 'posts';

    protected $fillable = ['name', 'slug', 'description', 'content', 'category_id', 'images'];

    const TYPE_POST = 1;
    const TYPE_SLIDER = 2;
    const TYPE_RIGHT = 3;
    const TYPE_HOT = 4;

    
}
