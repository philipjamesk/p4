@extends('layouts.master')

@section('title')
    Edit {{ $question->quiz->quiz_name  }} Question
@stop

@section('content')
    <h2>{{ $question->quiz->quiz_name }}</h2>
    @include('includes.errors')
    <form method="POST" action="/question/edit/{{ $question->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="text" value="{{ $question->question }}" size="60" name="question" id="question">
        <ul>
            @foreach($question->answer as $answer)
            <li>{{ $answer->answer }}
                @if($answer->correct)
                 - Correct Answer
                @endif
            </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary">Update Question</button>
    </form>
    <a href="/question/delete/{{ $question->id }}">Delete Question</a>
    <hr>    


@stop
