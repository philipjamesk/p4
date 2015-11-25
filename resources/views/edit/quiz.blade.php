@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    <form method="POST" action="/edit/{{ $quiz->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($quiz->question as $question)
            <p> 
                {{ $question->question }} - 
                <a href="/question/edit/{{ $question->id }}">Edit Question</a>
            </p>

            @include('includes.warning')

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
        <button type="submit" class="btn btn-primary">Save Quiz</button>
    </form>
    <hr>
@stop
