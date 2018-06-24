@extends('layouts.app')

@section('content')
<div class="container">
    <link href="{{ asset('css/multiple-select.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-2">
            <p>Search</p>
            <p><a href="{{ route('Tags') }}">Tags</a></p>
            <p><a href="{{ route('Departments') }}">Departments</a></p>
            <p><a href="{{ route('Search') }}">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Search Question</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('SearchQuestion') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Search') ? ' has-error' : '' }}">
                            <label for="Search" class="col-md-4 control-label">Search</label>

                            <div class="col-md-6">
                                <input id="Search" type="text" class="form-control" name="Search" required></input>

                                @if ($errors->has('Search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Search') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
