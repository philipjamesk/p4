@extends('layouts.master')

@section('content')
    <h2>List of Quizzes</h2>
    @for($i=0; $i<10; $i++)
        <p><a href="/quizzes/{{ $i }}">Quiz {{ $i }}</a></p>
    @endfor
@stop
