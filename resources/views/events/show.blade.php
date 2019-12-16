@extends('layouts.body')

@section('card-header-content')
  <a href="/newsfeed" class="btn btn-success">Back</a>
  <br>
  <br>
  <h2 class="text-center text-uppercase">{{$event->title}}</h2>
  <h4 class="text-center">{{$event->organization->name}}</h4>
@endsection

@section('card-body-content')
  <div class="row justify-content-center">
    <div class="col align-self-center text-center">
      <img style="width: 50%" src="/storage/images/cover_images/{{$event->cover_image}}"> 
      <br>
      <br>
      <h5>When: {{$event->occursAt}}</h5>
      <br>
      <h5>Venue: {{$event->venue}}</h5>
    </div>
  </div>
  <br>
  <br>
  <hr>
  <p class="text-center">{{$event->description}}</p>
  <hr>
  @if(!Auth::guest())
    @if(Auth::user()->id == $event->org_id)
      <a href="/events/{{$event->id}}/edit" class="btn btn-warning">Edit</a>
      {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif
@endsection
