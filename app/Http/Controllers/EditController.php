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
    * Responds to request to GET /edit/delete/question/{id}
    */
    public function getDeleteQuestion($id) {
        $question = Question::find($id);
        $quiz_id = $question->quiz->id;

        $answers = $question->answer;
        foreach ($answers as $answer) {
            Answer::find($answer->id)->delete();
        }
        $question->delete();

        return redirect('/edit/'.$quiz_id);
    }

    /**
    * Responds to request to GET /edit/delete/answer/{id}
    */
    public function getDeleteAnswer($id) {
        $answer = Answer::find($id);
        $quiz_id = $answer->question->quiz->id;
        $answer->delete();
        return redirect('/edit/'.$quiz_id);
    }
}
