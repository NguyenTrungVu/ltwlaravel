<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = "level";
    public $timestamps = false;
    protected $fillable=['name'];

    public function Question(){
        return $this->hasMany("Question::class", "id", "type");
    }
}
