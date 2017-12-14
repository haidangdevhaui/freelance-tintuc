<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
}
