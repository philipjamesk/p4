<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Quiz;
use App\Question;
use App\Answer;

class EditController extends Controller
{
    
    public function __construct() {
        # Put anything here that should happen before any of the other actions

    }

    /**
    * Responds to requests to GET /edit/quizzes
    */
    public function getQuizzes() {
        if (!(Auth::user()->teacher)) {
            return redirect()->action('QuizController@getQuizzes');
        }
        $quizzes = Quiz::all();
        return view('edit.list')->with('quizzes', $quizzes);
    }

    /**
    * Responds to requests to GET /edit/{id}
    */
    public function getEditQuiz($id) {
        $quiz = Quiz::with('question.answer')->find($id);
        return view('edit.quiz')->with('quiz', $quiz);
    }

    /**
    * Responds to requests to POST /edit/{id}
    */
    public function postEditQuiz($id) {
        $quiz = Quiz::with('question.answer')->find($id);
        return view('edit.quiz')->with('quiz', $quiz);
    }

    /**
    * Responds to request to GET /new
    */
    public function getEditNew() {
        return view('edit.new');
    }

    /**
    * Responds to request to POST /new
    */
    public function postEditNew(Request $request) {
        $quiz = New Quiz;
        $quiz->quiz_name = $request->quiz_name;
        $quiz->save();
        return redirect('/edit/'.$quiz->id);
    }

    /**
    * Responds to request to GET /edit/delete/answer/{answer_id}
    */
    public function getDeleteAnswer($answer_id) {
        $answer = Answer::find($answer_id);
        $quiz_id = $answer->question->quiz->id;
        $answer->delete();
        return redirect('/edit/'.$quiz_id);
    }
}
