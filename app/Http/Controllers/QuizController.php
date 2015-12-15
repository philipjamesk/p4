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
use App\Grade;

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
        } 
        
        // get grades for logged in user and put the quizzes in an array
        $grades = Grade::where('user_id', Auth::user()->id)->get()->lists('quiz_id');

        // get ready quizzes that have not been graded
        $quizzes = Quiz::whereNotIn('id', $grades)->where('ready', TRUE)->get();

        // if there are no ungraded quizzes flash message
        if($quizzes->count() == 0) {
            \Session::flash('flash_message','You have no ungraded quizzes.');
            return redirect('/');
        }
        return view('quiz.list')->with('quizzes', $quizzes);

    }

    /**
    * Responds to requests to GET /quizzes/{id?}
    */
    public function getQuizzesId($id=null) {
        
        // check that quiz had not already been taken by this user
        $grade = Grade::where('quiz_id', $id)->where('user_id', Auth::user()->id)->first();
        if(isset($grade)) {
            \Session::flash('flash_message','Quiz already graded!');
            return redirect('/');
        }

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
        $correct_answers = 0;
        foreach($request['answer_for_question'] as $answer){
            $correct = Answer::find($answer);
            if ($correct->correct) {
                $correct_answers++;
            }
        }
        $score = $correct_answers / $quiz->numberOfQuestions() * 100;

        // store grade in grades_table
        $grade = New Grade;
        $grade->user_id = Auth::user()->id;
        $grade->quiz_id = $id;
        $grade->grade = $score;
        $grade->save();

        return view('quiz.result')->with('id', $id)
                                  ->with('score', $score);
    }

}
