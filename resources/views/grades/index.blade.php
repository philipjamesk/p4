@extends('layouts.master')
 
@section('content')
    <table style="width:100%">
        <tr>
            <th>Quiz Name</th>
            <th>User Name</th>
            <th>Grade</th>
        </tr>
        @foreach($grades as $grade)
        <tr>
            <td>{{ $grade->quiz->quiz_name }}</td>
            <td>{{ $grade->user->name }}</td>
            <td>{{ $grade->grade }}</td>
        </tr>  
        @endforeach
    </table>
    <p><a href="/quizzes">View Ungraded Quizzes</a></p>
    
@stop
