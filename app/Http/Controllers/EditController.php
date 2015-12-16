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
    * Responds to request to GET /new
    */
    public function getEditNew() {
        return view('edit.new');
    }

    /**
    * Responds to request to POST /new
    */
    public function postEditNew(Request $request) {
        $this->validate(
            $request,
            [
                'quiz_name' => 'required|min:5',
            ]
        );

        $quiz = New Quiz;
        $quiz->quiz_name = $request->quiz_name;
        $quiz->save();
        return redirect('/edit/'.$quiz->id);
    }

    /**
    * Responds to request to GET /status/{id}
    */
    public function getStatus($id) {
        $quiz = Quiz::find($id);
        if($quiz->ready){
            $quiz->ready = FALSE;
        } else {
            $quiz->ready = TRUE;
        }
        $quiz->save();
        return redirect('/edit/'.$quiz->id);
    }

    /**
    * Responds to request to GET /delete/{id}
    */
    public function getDelete($id) {
        $quiz = Quiz::find($id);
        if($quiz->noGrades()) {
            return view('edit.delete')->with('quiz', $quiz);
        } else {
            \Session::flash('flash_message','Quiz had stored grades. Cannot be delete.');
            return redirect('/edit/'.$quiz->id);
        }
    }

    /**
    * Responds to request to GET /delete/confirm/{id}
    */
    public function getConfirmDelete($id) {
        $quiz = Quiz::find($id);
        
    }
}
