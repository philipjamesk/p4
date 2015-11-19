@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <form method="POST" action="/quizzes/{{ $quiz->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($quiz->question as $question)
            <p>{{ $question->question }} <a href="delete/question/{{ $question->id }}">Delete Question</a></p>
            <ul>
            @foreach($question->answer as $answer)
                <p><input type="text" name="{{ $answer->id }}" value="{{ $answer->answer }}"><a href="delete/answer/{{ $answer->id }}"> Delete Answer</a></p>
            @endforeach
                <a href="">Add Another Answer</a>
            </ul>
        @endforeach
        <button type="submit" class="btn btn-primary">Save Quiz</button>
    </form>
    <hr>
@stop
