@extends('layouts.master')

@section('content')
    <h2>Are you sure you want to delete {{ $quiz->quiz_name }}?</h2>
    <h3>This action cannot be undone.</h3>
    <a href="/delete/confirm/{{ $quiz->id }}"><button class="btn btn-danger">Delete</button></a>
@stop


