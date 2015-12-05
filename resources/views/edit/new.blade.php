@extends('layouts.master')

@section('content')
    <h2>Create New Quiz</h2>
    @include('includes.errors')
    <form method="POST" action="/new">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <fieldset>
            <label for="quiz_name">Quiz Name:</label>
            <input type="text" id="quiz_name" name="quiz_name">
        </fieldset>
        <button type="submit" class="btn btn-primary">Create Quiz</button>
    </form>
    <hr>
@stop
