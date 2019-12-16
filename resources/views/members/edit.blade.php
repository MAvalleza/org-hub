@extends('layouts.body')

@section('card-header-content')
  <h2>Edit Member</h2>
@endsection

@section('card-body-content')
  {!! Form::open(['action' => ['MembersController@update', $member->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('name', 'Member Name')}}
      {{Form::text('name', $member->name, ['class' => 'form-control', 'placeholder' => 'Member Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('course', 'Degree Program')}}
      {{Form::text('course', $member->course, ['class' => 'form-control', 'placeholder' => 'Degree Program'])}}
    </div>
    <div class="form-group">
      {{Form::label('year_level', 'Year Level')}}
      {{Form::number('year_level', $member->year_level, ['class' => 'form-control', 'placeholder' => 'Year Level'])}}
    </div>
    <div class="form-group">
      {{Form::label('contact_no', 'Contact No.')}}
      {{Form::text('contact_no', $member->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact No.'])}}
    </div>
    <div class="form-group">
      {{Form::label('email', 'Email')}}
      {{Form::text('email', $member->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    {{-- <div class="form-group">
      {{Form::file('cover_image')}}
    <</div> --}}
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}
@endsection