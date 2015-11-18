<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quiz;
use App\Question;
use App\Answer;

class EditController extends Controller
{
    
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /quizlist
    */
    public function getQuizList() {
        $quizzes = Quiz::all();
        return view('quiz.list')->with('quizzes', $quizzes);
    }

    /**
    * Responds to requests to GET /quizzes/{id?}
    */
    public function getQuizzesId($id=null) {
        $quiz = Quiz::find($id);
        return view('quiz.take')->with('quiz', $quiz);
    }

}
