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
        } else {
            $quizzes = Quiz::where('ready', TRUE)->get();
        }
        $grades = Grade::where('user_id', Auth::user()->id)->get();

        $active = array();
        foreach($quizzes as $quiz){
            array_push($active, $quiz->id);
        }
        $graded = array();
        foreach($grades as $grade){
            array_push($graded, $grade->quiz_id);
        }

        $diff = array_diff($active, $graded);

        dump($diff);

        $quiz_list = new \Illuminate\Database\Eloquent\Collection;

        foreach($diff as $quiz_id) {
            $quiz_list->add(Quiz::find($quiz_id));
        }

        return view('quiz.list')->with('quizzes', $quiz_list);
    }

    /**
    * Responds to requests to GET /quizzes/{id?}
    */
    public function getQuizzesId($id=null) {
        $grade = Grade::where('quiz_id', $id)->where('user_id', Auth::user()->id);
        dump($grade);
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
