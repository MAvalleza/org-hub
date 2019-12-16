@extends('layouts.body')

@section('card-header-content')
  <h2>Members</h2>
  <a href="/members/create" class="btn btn-primary btn-lg">Add Member</a>
@endsection

@section('card-body-content')
  @if(count($members) > 0)
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
            <td>Member ID</td>
            <td>Name</td>
            <td>Course</td>
            <td>Year Level</td>
            <td></td>
            <td></td>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{$member->id}}</td>
                <td>{{$member->name}}</td>
                <td>{{$member->course}}</td>
                <td>{{$member->year_level}}</td>
                <td colspan="1">
                  <a href="/members/{{$member->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                </td>
                <td colspan="1">
                  {!!Form::open(['action' => ['MembersController@destroy', $member->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                  {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
      </tbody>
      {{ $members->links()}}
    </table>
  @else
    <p>No members found</p>
  @endif
@endsection