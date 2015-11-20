@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <form method="POST" action="/edit/{{ $quiz->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($quiz->question as $question)
            <p> 
                {{ $question->question }} - 
                <a href="edit/question/{{ $question->id }}">Edit Question</a> - 
                <a href="delete/question/{{ $question->id }}">Delete Question</a>
            </p>
            <ul>
            @foreach($question->answer as $answer)
                <p>
                    {{ $answer->answer }} - 
                    <a href="edit/answer/{{ $answer->id }}">Edit Answer</a> - 
                    <a href="delete/answer/{{ $answer->id }}">Delete Answer</a>
                </p>
            @endforeach
                <a href="/edit/add/answer/{{ $question->id }}">Add New Answer</a>
            </ul>
        @endforeach
        <p><a href="/edit/add/question/{{ $quiz->id }}">Add New Question</a></p>
        <button type="submit" class="btn btn-primary">Save Quiz</button>
    </form>
    <hr>
@stop
