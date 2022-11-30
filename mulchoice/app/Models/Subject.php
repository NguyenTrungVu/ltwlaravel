<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    public $timestamps = false;
    protected $fillable=['name', 'cate_id'];

    public function Category(){
        return $this->belongsTo("Category::class", "id", "cate_id");
    }

    public function Question(){
        return $this->hasMany("Question::class", "id", "subject_id");
    }
}
