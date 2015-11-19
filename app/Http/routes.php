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

Route::get('/home', function() {
    return redirect('/');
});
    
Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/quizzes', 'QuizController@getQuizzes');
    Route::get('/quizzes/{id?}', 'QuizController@getQuizzesId');
    Route::post('/quizzes/{id?}', 'QuizController@postQuizzesResult');

    Route::get('/grades', 'GradesController@getGrades');

});

Route::group(['middleware' => 'App\Http\Middleware\TeacherMiddleware'], function () {

    Route::get('/edit/quizzes', 'EditController@getQuizzes');
    Route::get('/edit/{id?}', 'EditController@getEditQuiz');
    Route::get('/edit/delete/question/{id?}', 'EditController@getDeleteQuestion');
    Route::get('/edit/delete/answer/{id?}', 'EditController@getDeleteAnswer');
    Route::get('/new', 'EditController@getEditNew');
    Route::post('/new', 'EditController@postEditNew');

});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
   'password' => 'Auth\PasswordController',
]);