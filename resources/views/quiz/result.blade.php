@extends('layouts.master')

@section('content')
    <h2>Result of Quiz {{ $id }}</h2>
    <h3>You scored {{ number_format($score, 2, '.', '') }}%</h3>
    <p><a href="/grades">View Grades</a></p>
    <p><a href="/">Return Home</a></p>
@stop
