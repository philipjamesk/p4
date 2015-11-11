<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

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
    public function postQuizzesResult($id=null, Request $request) {
        $request->all();
        $number_of_questions = 0;
        $correct_answers = 0;
        
        $request->flash();

        foreach($request['answer'] as $answer){
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
