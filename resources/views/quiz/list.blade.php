@extends('layouts.master')

@section('content')
    <h2>List of Quizzes</h2>
    
    <ul> 
    @foreach($quizzes as $quiz)
      <li><a href="/quizzes/{{ $quiz->id }}">{{ $quiz->quiz_name }}</a></li>  
    @endforeach
    </ul>
    
@stop
