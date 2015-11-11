@extends('layouts.master')

@section('content')
    <h2>Quiz {{ $id }}</h2>
    <form method="POST" action="/quizzes/{{ $id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($questions as $question)
            <p>{{ $question->question }}</p>
            <ul>
                @foreach($answers[$question->id] as $answer)
                    <label class="radio">
                        <input type="radio" name="answer[{{ $question->id }}]" value="{{ $answer->id }}">
                        {{ $answer->answer }}
                    </label>
                @endforeach
            </ul>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
@stop
