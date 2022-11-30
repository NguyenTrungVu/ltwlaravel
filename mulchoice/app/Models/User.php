<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "tb_user";
    public $timestamps = false;
    protected $fillable=['username', 'email', 'phone', 'password', 'active', 'avatar', 'user_role'];
 
}
