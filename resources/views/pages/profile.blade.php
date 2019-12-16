@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Profile</h2>
    </div>
    <div class="card-body">
      <h3>{{$organization->name}}</h3>
      <profile :organization="{{Auth::user()}}"> </profile>
    </div>
  </div>
@endsection
 
