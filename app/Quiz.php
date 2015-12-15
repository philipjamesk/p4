<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    public function question() {
        return $this->hasMany('\App\Question');
    }
    
    public function grade() {
        return $this->hasMany('\App\Grade');
    }
    

    public function numberOfQuestions() {
        return Question::where('quiz_id', '=', $this->id)->get()->count();
    }
}
