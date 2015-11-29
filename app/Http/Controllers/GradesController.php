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
        $grades = Grade::with('user', 'quiz')->get();

        return view('grades.index')->with('grades', $grades);
    }
}
