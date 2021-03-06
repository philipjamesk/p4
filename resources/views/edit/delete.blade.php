@extends('layouts.master')

@section('title')
    Confirm Delete
@stop

@section('content')
    <h2>Are you sure you want to delete {{ $quiz->quiz_name }}?</h2>
    <h3>This action cannot be undone.</h3>
    <a href="/delete/confirm/{{ $quiz->id }}"><button class="btn btn-danger">Delete Quiz</button></a>
    <p><a href="/edit/{{ $quiz->id }}">Return to edit {{ $quiz->quiz_name }}</a></p>
@stop


