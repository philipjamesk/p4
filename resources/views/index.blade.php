@extends('layouts.master')

@section('content')
    <h1>Welcome to QuizMark</h1>
    <h3>The Online Quiz Host</h3>
    <hr>
    <p>QuizMark is an online quiz hosting platform. Read more about it <a href="/about">here</a>.</p>
    @if(!Auth::check())
        <p>If you are student or a teacher who is already registered, you can <a href="/login">login here</a>.</p>
        <p>If you have not yet signed up, you can <a href="/register">register here</a> instead.</p>
    @endif

@stop

