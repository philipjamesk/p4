@extends('layouts.master')
 
@section('content')
    @if($quizzes->count() != 0)
    <h2>List of Quizzes</h2>
    @endif
    <ul> 
    @foreach($quizzes as $quiz)
      <li><a href="/quizzes/{{ $quiz->id }}">{{ $quiz->quiz_name }}</a></li>  
    @endforeach
    </ul>

    <p><a href="/grades">View Grades</a></p>
    
@stop
