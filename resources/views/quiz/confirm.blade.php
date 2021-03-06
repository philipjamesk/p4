@extends('layouts.master')

@section('title')
    Confirm Take {{ $quiz->quiz_name }} 
@stop

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <p>Are you sure you are ready to take the quiz?</p>
    <p>Once you start the quiz you must complete and submit it or you will receive a grade of 0%.</p>
    <a href="/quizzes/{{ $quiz->id }}"><div class="btn btn-primary">Take Quiz</div></a>
    <p><a href="/quizzes">Return to Quiz List</a></p>
    <hr>
@stop
