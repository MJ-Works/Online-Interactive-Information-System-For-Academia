@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
