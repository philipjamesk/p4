@extends('layouts.master')

@section('content')
    <h2>Result of Quiz {{ $id }}</h2>
    <h3>You scored {{ $score }}%</h3>
@stop
