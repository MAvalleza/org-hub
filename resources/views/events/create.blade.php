@extends('layouts.body')

@section('card-header-content')
  <h2>Add New Event</h2>
@endsection

@section('card-body-content')
  {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Event Name')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
      {{Form::label('venue', 'Venue')}}
      {{Form::text('venue', '', ['class' => 'form-control', 'placeholder' => 'Venue'])}}
    </div>
    <div class="form-group">
      {{Form::label('occursAt', 'Event Date')}}
      {{Form::text('occursAt', '', ['class' => 'form-control', 'placeholder' => 'Event Date'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection