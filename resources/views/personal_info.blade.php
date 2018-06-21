@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Personal Info</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('FullName') ? ' has-error' : '' }}">
                            <label for="FullName" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="FullName" type="text" class="form-control" name="FullName" required>

                                @if ($errors->has('FullName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('FullName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('City') ? ' has-error' : '' }}">
                            <label for="City" class="col-md-4 control-label">City </label>

                            <div class="col-md-6">
                                <input id="City" type="text" class="form-control" name="City">

                                @if ($errors->has('City'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('PostCode') ? ' has-error' : '' }}">
                            <label for="PostCode" class="col-md-4 control-label">Post Code</label>

                            <div class="col-md-6">
                                <input id="PostCode" type="text" class="form-control" name="PostCode">

                                @if ($errors->has('PostCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('PostCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                            <label for="Phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="Phone" type="text" class="form-control" name="Phone">

                                @if ($errors->has('Phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
