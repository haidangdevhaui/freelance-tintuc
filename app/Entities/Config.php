<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "configs";
    protected $fillable = ['maintenance'];
}
