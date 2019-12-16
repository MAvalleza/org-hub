@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  @yield('card-header-content')
              </div>
              <div class="card-body">
                @yield('card-body-content')
              </div>
@endsection