<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User_category extends Model
{
    protected $table = "user_categories";
    protected $fillable = ['user_id', 'category_id'];
}
