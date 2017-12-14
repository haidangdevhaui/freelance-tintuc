<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post_type extends Model
{
    protected $table = 'post_types';
    protected $fillable = ['type'];
}
