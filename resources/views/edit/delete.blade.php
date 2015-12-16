@extends('layouts.master')

@section('content')
    <h2>Are you sure you want to delete {{ $quiz->quiz_name }}?</h2>
    <h3>This action cannot be undone.</h3>
    <button class="btn btn-danger"><a href="/delete/confirm/{{ $quiz->id }}">Delete</a></button>
@stop


