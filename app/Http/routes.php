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

Route::get('/quizzes', 'QuizController@getQuizzes');
Route::get('/quizzes/{id?}', 'QuizController@getQuizzesId');
Route::post('/quizzes/{id?}', 'QuizController@postQuizzesResult');

Route::get('/quiz/edit', 'EditController@getQuizList');
// Route::get('/edit/{id?}', 'EditController@getEditQuiz');
// Route::get('/edit/new', 'EditController@getEditNew');

Route::get('/grades', 'GradesController@getGrades');

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