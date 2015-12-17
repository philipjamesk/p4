@extends('layouts.master')

@section('title')
    {{ $quiz->quiz_name }} 
@stop

@section('content')
    <h2>Quiz {{ $quiz->id }}</h2>
    <p>If you close the page without completing you will receive a grade of 0%.</p>
    <p>All questions are multiple choice with <strong>one</strong> correct answer. You must answer <strong>all questions</strong> to submit the quiz.</p>
    <hr>
    @include('includes.errors')
    <form method="POST" action="/quizzes/{{ $quiz->id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        @foreach($quiz->question as $index => $question)
            <p>{{ $index + 1 }}. {{ $question->question }}</p>
            <ul>
            @foreach($question->answer as $answer)
                <label class="radio">
                    <input type="radio" 
                           name="answer_for_question[{{ $question->id }}]" 
                           value="{{ $answer->id }}" 
                           {{ old('answer_for_question.'.$question->id) == $answer->id ? 'checked' : '' }} >
                    {{ $answer->answer }}
                </label>
            @endforeach
            </ul>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
@stop
