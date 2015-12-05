@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <p class="status">
    @if($quiz->ready)
        Quiz is currently active. <a href="/status/{{ $quiz->id }}">Change to inactive</a>
    @else
        Quiz is currently not active. <a href="/status/{{ $quiz->id }}">Change to active</a>
    @endif
    </p>
    @foreach($quiz->question as $question)
        <p id="question{{ $question->id }}"> 
            {{ $question->question }} - 
            <a href="/question/edit/{{ $question->id }}">Edit Question</a>
        </p>

        @include('includes.warning')
        <ul>
        @foreach($question->answer as $answer)
            <p>
                {{ $answer->answer }} 
                @if($answer->correct)
                 - Correct Answer
                @endif
                 - <a href="/answer/edit/{{ $answer->id }}">Edit Answer</a>
            </p>
        @endforeach
            <a href="/answer/add/{{ $question->id }}">Add New Answer</a>
            <br>
            <br>
        </ul>
    @endforeach
    <p><a href="/question/add/{{ $quiz->id }}">Add New Question</a></p>
    <hr>
@stop
