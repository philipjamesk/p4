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
        $answercount = 0;

        foreach($quiz->question->answer as $answer){
            dump($answer);
        }
        if($answercount == 0) {
            $warning = "This question has no correct answers!";
        }elseif($answercount > 1) {
            $warning = "This question has more than one correct answer!";
        }else{
            $warning = NULL;
        }
        return view('edit.quiz')->with('quiz', $quiz)
                                ->with('warning', $warning);
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
}
