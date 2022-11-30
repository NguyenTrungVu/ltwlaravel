<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
   
    protected $table = "questions";
    public $timestamps = false;
    protected $fillable=['content', 'answera', 'answerb', 'answerc', 'answerd', 'correctanswer', 'created_date', 'type', 'image', 'subject_id'];

    public function Subject(){
        return $this->belongsTo("Subject::class", "id", "subject_id");
    }

    public function Level() { 
        return $this->belongsTo("Level::class", "id", "type");
    }
}
