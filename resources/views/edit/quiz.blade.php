@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <form method="POST" action="/edit/{{ $quiz->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($quiz->question as $question)
            <p><input type="text" name="{{ $question->id }}" value="{{ $question->question }}"><a href="delete/question/{{ $question->id }}">Delete Question</a></p>
            <ul>
            @foreach($question->answer as $answer)
                <p><input type="text" name="{{ $answer->id }}" value="{{ $answer->answer }}"><a href="delete/answer/{{ $answer->id }}"> Delete Answer</a></p>
            @endforeach
                <a href="">Add New Answer</a>
            </ul>
        @endforeach
        <p><a href="/edit/add/question/{{ $quiz->id }}">Add New Question</a></p>
        <button type="submit" class="btn btn-primary">Save Quiz</button>
    </form>
    <hr>
@stop
