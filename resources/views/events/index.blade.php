@extends('layouts.body')

@section('card-header-content')
  <h2>Events</h2>
  <a href="/events/create" class="btn btn-primary btn-lg">Create Event</a>
@endsection

@section('card-body-content')
  @if(count($organization->events) > 0)
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
            <td>Event ID</td>
            <td>Title</td>
            <td>Description</td>
            <td></td>
            <td></td>
        </tr>
      </thead>
      <tbody>
        @foreach($organization->events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->description}}</td>
                <td colspan="1">
                  <a href="/events/{{$event->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                </td>
                <td colspan="1">
                  {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                  {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
      </tbody>
      {{-- {{ $events->links()}} --}}
    </table>
  @else
    <p>No events found</p>
  @endif
@endsection