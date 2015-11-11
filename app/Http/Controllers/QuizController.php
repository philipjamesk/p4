<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $quizzes = Quiz::all();
        return view('quiz.list')->with('quizzes', $quizzes);
    }

    /**
    * Responds to requests to GET /quizzes/{id?}
    */
    public function getQuizzesId($id=null) {
        $questions = Question::where('quiz_id', $id)->get();
        $all_answers = [];
        foreach ($questions as $question) {
            $answers = Answer::where('question_id', $question->id)->get();
            $all_answers[$question->id] = $answers;
        }
        return view('quiz.take')->with('id', $id)
                                ->with('questions', $questions)
                                ->with('answers', $all_answers);
    }

    /**
    * Responds to requests to POST /quizzes/{id?}
    */
    public function postQuizzesResult($id=null) {
        return view('quiz.result')->with('id', $id);
    }

}
