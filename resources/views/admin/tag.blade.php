@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Tag</div>

                <div class="panel-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tag Name</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allTag as $key=>$tag)
                    <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$tag->TagName}}</td>
                    <td><form class="form-horizontal" method="POST" action="{{ route('DeleteTag') }}">{{ csrf_field() }} <button type="submit" value = "{{$tag->id}}" name="submit" class="btn btn-danger">Delete</button></form></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                
                    <form class="form-horizontal" method="POST" action="{{ route('PostTag') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('TagName') ? ' has-error' : '' }}">
                            <label for="TagName" class="col-md-4 control-label">Tag Name</label>

                            <div class="col-md-6">
                                <input id="TagName" type="text" class="form-control" name="TagName" required></input>

                                @if ($errors->has('TagName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('TagName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
