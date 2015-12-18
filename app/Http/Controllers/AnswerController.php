<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Quiz;
use App\Question;
use App\Answer;

class AnswerController extends Controller
{
    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    /**
    * Responds to request to GET /answer/add/{question_id}
    */
    public function getAnswerAdd($question_id) {
        $question = Quiz::find($question_id);
        $answer = New Answer;
        $answer->question_id = $question_id;
        $answer->save();

        return redirect('/answer/edit/'.$answer->id);
    }

    /**
    * Responds to request to GET /answer/edit/{question_id}
    */
    public function getAnswerEdit($answer_id) {
        $answer = Answer::with('question.quiz')->find($answer_id);

        if(is_null($answer)) {
            \Session::flash('flash_message','Answer not found.');
            return redirect('/edit/quizzes');
        }

        return view('edit.answer')->with('answer', $answer);
    }

    /**
    * Responds to request to POST /answer/edit/{ansswer_id}
    */
    public function postAnswerEdit($answer_id, Request $request) {
        $this->validate(
            $request,
            [
                'answer' => 'required',
            ]
        );
        $answer = Answer::find($answer_id); 
        $answer->answer = $request->answer;
        if($request->correct){
            $answer->correct = TRUE;
        } else {
            $answer->correct = FALSE;
        }
        $answer->save();
        return redirect('/edit/'.$answer->question->quiz_id.'#question'.$answer->question->id);
    }
 
    /**
    * Responds to request to GET /answer/delete/{question_id}
    */
    public function getAnswerDelete($answer_id) {
        $answer = Answer::find($answer_id);
        $quiz_id = $answer->question->quiz_id;
        $answer->delete();
        return redirect('/edit/'.$quiz_id);
    }
}
