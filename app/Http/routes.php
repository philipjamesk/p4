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

Route::get('/edit/{id?}', 'EditController@getEditQuiz');
Route::get('/edit/new', 'EditController@getEditNew');

Route::get('/grades', 'GradesController@getGrades');

