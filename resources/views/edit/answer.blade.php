@extends('layouts.master')

@section('content')
    <h2>Test</h2>
    <form method="POST" action="/answer/edit/{{ $answer->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <p>{{ $answer->question->question }}</p>
        <ul>
            @foreach($answer->question->answer as $answerlist)
            <li>
                <ul>
                @if($answerlist->id == $answer->id)
                    <input type="text" name="answer" id="answer" value="{{ $answerlist->answer }}">
                    <input type="checkbox" name="correct" id="correct"><label for="correct">Correct</label> 
                @else 
                    {{ $answerlist->answer }}
                @endif
                @if($answerlist->correct)
                 - Correct Answer
                @endif
                </ul>
            </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary">Update Answer</button>
    </form>
    <a href="/answer/delete/{{ $answer->id }}">Delete Answer</a>
    <hr>    


@stop
