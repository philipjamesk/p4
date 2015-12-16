<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

/* These routes are only for logged in users */
Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/quizzes', 'QuizController@getQuizzes');
    Route::get('/quizzes/{id}', 'QuizController@getQuizzesId');
    Route::get('/quizzes/confirm/{id}', 'QuizController@getConfirmQuizzesId');
    Route::post('/quizzes/{id}', 'QuizController@postQuizzesResult');

    Route::get('/grades', 'GradesController@getGrades');

});

/*These routes are only for teachers */
Route::group(['middleware' => 'App\Http\Middleware\TeacherMiddleware'], function () {

    // quiz routes
    Route::get('/edit/quizzes', 'EditController@getQuizzes');
    Route::get('/edit/{id}', 'EditController@getEditQuiz');
    Route::get('/new', 'EditController@getEditNew');
    Route::post('/new', 'EditController@postEditNew');
    Route::get('/status/{id}', 'EditController@getStatus');
    Route::get('/delete/{id}', 'EditController@getDelete');
    Route::get('/delete/confirm/{id}', 'EditController@getConfirmDelete');

    // question routes
    Route::get('/question/add/{quiz_id}', 'QuestionController@getQuestionAdd');
    Route::get('/question/edit/{question_id}', 'QuestionController@getQuestionEdit');
    Route::post('/question/edit/{question_id}', 'QuestionController@postQuestionEdit');
    Route::get('/question/delete/{question_id}', 'QuestionController@getQuestionDelete');

    // answer routes
    Route::get('/answer/add/{question_id}', 'AnswerController@getAnswerAdd');
    Route::get('/answer/edit/{answer_id}', 'AnswerController@getAnswerEdit');
    Route::post('/answer/edit/{answer_id}', 'AnswerController@postAnswerEdit');
    Route::get('/answer/delete/{answer_id}', 'AnswerController@getAnswerDelete');
    
});


// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

