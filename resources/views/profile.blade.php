@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <p><a href="{{ route('Home') }}">Home</a></p>
            <p><a href="{{ route('Tags') }}">Tags</a></p>
            <p><a href="{{ route('Departments') }}">Departments</a></p>
            <p><a href="{{ route('Search') }}">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>User Profile</strong></div>
                <div class="panel-body">
                   <div class="col-md-12"><h2>Name: {{$user->name}}</h2></div>
                   <div class="col-md-12"><h2>Email: {{$user->email}}</h2></div>
                   <div class="col-md-12"><h2>Reputation: {{$user->rating}}</h2></div>
                   <div class="col-md-12"><h2>Designation: {{$user->designation}}</h2></div>
                </div>
        </div>
    </div>
</div>
@endsection
