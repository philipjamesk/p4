<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Quiz;
use App\Question;
use App\Answer;
use App\Grade;

class GradesController extends Controller
{
    
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /grades
    */
    public function getGrades() {
        
        if(Auth::user()->teacher){
            $grades = Grade::orderBy('user_id', 'desc')->with('user', 'quiz')->get();
        } else {
            $grades = Grade::with('user', 'quiz')->where('user_id', Auth::user()->id)->get();
        }
        
        // redirect if no grades are found
        if($grades->count() == 0) {
            \Session::flash('flash_message','There are no grades to display.');
            return redirect('/quizzes');
        }

        return view('grades.index')->with('grades', $grades);
    }
}
