<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    public $timestamps = false;
    protected $fillable=['name'];

    public function Subject(){
        return $this ->hasMany("Subject::class", "id", "cate_id");
    }
}
