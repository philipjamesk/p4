@extends('layouts.master')

@section('content')
    <h2>{{ $quiz->quiz_name }}</h2>
    @if($quiz->ready)
        <p class="status">Quiz is currently active. You must make it inactive to edit!</p> 
        <a href="/status/{{ $quiz->id }}"><button class="btn btn-warning">Set to Inactive</button></a>
    @else
        <p class="status">Quiz is currently not active.</p> 
        <a href="/status/{{ $quiz->id }}"><button class="btn btn-success">Set to Active</button></a>
        <a href="/delete/{{ $quiz->id }}"><button class="btn btn-danger">Delete Quiz</button></a>

        @if(isset($warnings))
            <h3><span class="label label-warning">Quiz cannot be set to active see warnings!</span></h3>
        @endif
        <hr>
        @foreach($quiz->question as $index => $question)
            <p id="question{{ $question->id }}"> 
                {{ $index + 1 }}. {{ $question->question }} - 
                <a href="/question/edit/{{ $question->id }}">Edit Question</a>
                @if(isset($warnings))
                    @if($warnings->has($question->id))
                        @include('includes.warnings')
                    @endif
                @endif
            </p>
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
    @endif
@stop


