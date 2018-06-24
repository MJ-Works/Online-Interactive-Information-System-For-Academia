@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <p>Deparment Search</p>
            <p><a href="{{ route('Home') }}">Home</a></p>
            <p><a href="{{ route('Tags') }}">Tags</a></p>
            <p><a href="{{ route('Departments') }}">Departments</a></p>
            <p><a href="{{ route('Search') }}">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Tags</div>
                
                <div class="panel-body">
                    @foreach($tags as $tag)
                        <div class="col-sm-2">
                            <a href="{{ route('QuestionByDepartment',$tag->id) }}"> <span class="tag">{{$tag->DepartmentName}}</span> <span>   </span> </a> 
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
