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
    
    /**
     * Count the number of question for a quiz
     *
     * @return int
     */   
    public function numberOfQuestions() {
        return Question::where('quiz_id', '=', $this->id)->get()->count();
    }
    
    /**
     * Check if a quiz has stored grades
     *
     * @return boolean
     */  
    public function noGrades() {
        if (Grade::where('quiz_id', '=', $this->id)->get()->count() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Return any question id's and warnings if a question does not have exactly 1 correct answer
     *
     * @return collection
     */
    public function warnings() {
        $warnings = new \Illuminate\Database\Eloquent\Collection;
        $questions = Question::where('quiz_id', '=', $this->id)->get();

        foreach ($questions as $question) {
            $number_of_correct_answers = $question->numberOfCorrectAnswers(); 
            if ($number_of_correct_answers != 1) {
                $warning = 'Question has '.$number_of_correct_answers.' correct answers!';
                $warnings->put($question->id, $warning);
            }
        }

        return $warnings;
    }
}
