@extends('layouts.master')

@section('content')
    <h2>Quiz {{ $id }}</h2>
    <form method="POST" action="/quizzes/{{ $id }}">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
