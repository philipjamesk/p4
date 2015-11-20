@extends('layouts.master')

@section('content')
    <h2>List of Quizzes</h2>
    
    <ul> 
    @foreach($quizzes as $quiz)
      <li><a href="/edit/{{ $quiz->id }}">Edit {{ $quiz->quiz_name }}</a></li>
      @if($quiz->ready)
        <p>Quiz is active</p>
      @else
        <p>Quiz is not active</p>
      @endif  
    @endforeach
    </ul>
    <p><a href="/new">Add New Quiz</a></p>
@stop
