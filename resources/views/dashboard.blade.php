@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Dashboard</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Welcome to your dashboard!</h3>
                    </h4>What would you like to do today?</h4>

                    <div class="row justify-content-center pt-4">
                        <div class="col-md-4 text-center">
                            <div class="card" style="width: 18 rem;">
                                <div class="card-body text-center">
                                    <img class="card-img-top" src="/storage/images/org.png" alt="Card image cap">
                                    <h4 class="card-title pt-3">Profile</h4>
                                    <p class="card-text">Edit your organization profile details</p>
                                    <a href="/profile/{{auth()->user()->id}}/edit" class="btn btn-primary">Go</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="card text-center" style="width: 18 rem;">
                                <div class="card-body text-center">
                                    <img class="card-img-top" src="/storage/images/members.png" alt="Card image cap">
                                    <h4 class="card-title pt-3">Members</h4>
                                    <p class="card-text">Manage your organization's members</p>
                                    <a href="/members" class="btn btn-primary">Go</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="card text-center" style="width: 18 rem;">
                                <div class="card-body text-center">
                                    <img class="card-img-top" src="/storage/images/events.png" alt="Card image cap">
                                    <h4 class="card-title pt-3">Events</h4>
                                    <p class="card-text">See your list of events</p>
                                    <a href="/events" class="btn btn-primary">Go</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
