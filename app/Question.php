<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function answer() {
        return $this->hasMany('\App\Answer');
    }

    public function quiz() {
        return $this->belongsTo('\App\Quiz');
    }
    
    /**
     * Count the number of correct answers for a question
     *
     * @return int
     */
    public function numberOfCorrectAnswers() {
        return Answer::where('question_id', '=', $this->id)->where('correct', 1)->count();
    }
}
