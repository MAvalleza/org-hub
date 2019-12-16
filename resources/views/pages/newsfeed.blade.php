@extends('layouts.body')

@section('card-header-content')
  <h2>Newsfeed</h2>
@endsection

@section('card-body-content')
  @if(count($events) > 0)
    @foreach ($events as $event)
      <div class="well">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <img style="width: 100%" src="/storage/images/cover_images/{{$event->cover_image}}">
          </div>
          <div class="col-md-8 col-sm-8">
            <h3><a href="/events/{{$event->id}}">{{$event->title}}</a></h3>
            <small>Will be held at {{$event->occursAt}} by {{$event->organization->name}}</small>
            <br>
            <small>Venue: {{$event->venue}}</small>
            <br>
            <br>
            <p>{{$event->description}}</p>
          </div>
        </div>
      </div>
      <br>
      <hr>
    @endforeach
    {{ $events->links()}}
  @else
    <p>No events found</p>
  @endif
@endsection