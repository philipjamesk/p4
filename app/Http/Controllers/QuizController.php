<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

use Auth;

use App\Quiz;
use App\Question;
use App\Answer;

class QuizController extends Controller
{
    
    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    /**
    * Responds to requests to GET /quizzes
    */
    public function getQuizzes() {
        if (Auth::user()->teacher) {
            return redirect()->action('EditController@getQuizzes');
        } else {
            $quizzes = Quiz::where('ready', TRUE)->get();
        }
        return view('quiz.list')->with('quizzes', $quizzes);
    }

    /**
    * Responds to requests to GET /quizzes/{id?}
    */
    public function getQuizzesId($id=null) {
        $quiz = Quiz::with('question.answer')->find($id);
        return view('quiz.take')->with('quiz', $quiz);
    }

    /**
    * Responds to requests to POST /quizzes/{id?}
    */
    public function postQuizzesResult($id, Request $request) {

        $request->all();

        // get quiz for validation 
        $quiz = Quiz::find($id);
        $messages = array('required' => 'You must answer all questions!');
        foreach($quiz->question as $question){
            $this->validate(
                $request,
                [
                    'answer_for_question.'.$question->id => 'required',
                ],
                $messages
            );
        }

        // Grades quiz
        $number_of_questions = 0;
        $correct_answers = 0;
        foreach($request['answer_for_question'] as $answer){
            $number_of_questions++;
            $correct = Answer::find($answer);
            if ($correct->correct) {
                $correct_answers++;
            }
        }
        $score = $correct_answers / $number_of_questions * 100;

        return view('quiz.result')->with('id', $id)
                                  ->with('score', $score);
    }

}
