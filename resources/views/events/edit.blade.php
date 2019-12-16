@extends('layouts.body')

@section('card-header-content')
  <h2>Edit Event</h2>
@endsection

@section('card-body-content')
  {!! Form::open(['action' => ['EventsController@update', $event->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Event Name')}}
      {{Form::text('title', $event->title, ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', $event->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
      {{Form::label('venue', 'Venue')}}
      {{Form::text('venue', $event->venue, ['class' => 'form-control', 'placeholder' => 'Venue'])}}
    </div>
    <div class="form-group">
      {{Form::label('occursAt', 'Event Date')}}
      {{Form::text('occursAt', $event->occursAt, ['class' => 'form-control', 'placeholder' => 'Event Date'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection