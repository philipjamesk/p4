<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Quiz;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    /**
    * Responds to request to GET /question/add/{quiz_id}
    */
    public function getQuestionAdd($quiz_id) {
        $quiz = Quiz::find($quiz_id);
        $question = New Question;
        $question->quiz_id = $quiz_id;
        $question->save();

        return redirect('/question/edit/'.$question->id);
    }

    /**
    * Responds to request to GET /question/edit/{question_id}
    */
    public function getQuestionEdit($question_id) {
        $question = Question::with('quiz', 'answer')->find($question_id);

        if(is_null($question)) {
            \Session::flash('flash_message','Question not found.');
            return redirect('/edit/quizzes');
        }

        return view('edit.question')->with('question', $question);
    }

    /**
    * Responds to request to POST /question/edit/{question_id}
    */
    public function postQuestionEdit($question_id, Request $request) {
        $this->validate(
            $request,
            [
                'question' => 'required|min:5',
            ]
        );
        
        $question = Question::find($question_id); 
        $question->question = $request->question;
        $question->save();

        return redirect('/edit/'.$question->quiz_id.'#question'.$question_id);
    }
 
    /**
    * Responds to request to GET /question/delete/{question_id}
    */
    public function getQuestionDelete($question_id) {
        $question = Question::with('quiz')->find($question_id);
        
        // store quiz_id for redirect
        $quiz_id = $question->quiz->id;
        $question->delete();

        return redirect('/edit/'.$quiz_id);
    }
}
