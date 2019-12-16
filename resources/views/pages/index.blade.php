@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>
      <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
      <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
    </p>
    <img width="60%" src="/storage/images/students.png">
  </div>
@endsection
 
