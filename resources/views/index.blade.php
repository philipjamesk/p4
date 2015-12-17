@extends('layouts.master')

@section('content')
    <h1>Welcome to QuizMark</h1>
    <h3>The Online Quiz Host</h3>
    <hr>
    @if(Auth::check())
        <h4>Welcome, {{ Auth::user()->name }}!</h4>
        <p><a href="/quizzes">View available quizzes</a></p>
        <p><a href="/grades">View grades</a></p>
    @else    
        <p>If you are student or a teacher who is already registered, you can <a href="/login">login here</a>.</p>
        <p>If you have not yet signed up, you can <a href="/register">register here</a> instead.</p>
    @endif
    <hr>
    <p>QuizMark is an online quiz hosting platform. Read more about it <a href="/about">here</a>.</p>
@stop

