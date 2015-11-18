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
    * Responds to requests to GET /edit/{id?}
    */
    public function getEditQuiz($id=null) {
        $quiz = Quiz::find($id);
        return view('edit.quiz')->with('quiz', $quiz);
    }

}
