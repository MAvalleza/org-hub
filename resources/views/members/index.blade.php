@extends('members.layout')

@section('card-header-content')
  <h2>Members</h2>
  <a href="/members/create" class="btn btn-dark">Add Member</a>
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
                <td></td>
                <td></td>
            </tr>
        @endforeach
      </tbody>
      {{ $members->links()}}
    </table>
  @else
    <p>No members found</p>
  @endif
@endsection