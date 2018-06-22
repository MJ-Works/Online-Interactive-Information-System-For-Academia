@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Deparment</div>

                <div class="panel-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allDepartment as $key=>$department)
                    <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$department->DepartmentName}}</td>
                    <td><form class="form-horizontal" method="POST" action="{{ route('DeleteDepartment') }}">{{ csrf_field() }} <button type="submit" value = "{{$department->id}}" name="submit" class="btn btn-danger">Delete</button></form></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

                    <form class="form-horizontal" method="POST" action="{{ route('PostDepartment') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('DepartmentName') ? ' has-error' : '' }}">
                            <label for="DepartmentName" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="DepartmentName" type="text" class="form-control" name="DepartmentName" required></input>

                                @if ($errors->has('DepartmentName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DepartmentName') }}</strong>
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
