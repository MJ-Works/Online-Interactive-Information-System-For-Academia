@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <p>Home</p>
            <p><a href="">Tags</a></p>
            <p><a href="">Department</a></p>
            <p><a href="">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Top Questions</strong></div>
                @foreach($allQuestion as $question)
                <div class="panel-body">
                   <div class="col-md-2 votes">{{$question->votes}} Votes</div>
                   <div class="col-md-2 answer">{{$question->answers->count()}} Answer</div>
                   <div class="col-md-8 question">
                        <a href="">{{$question->Heading}}</a>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($question->tags as $tag)
                                <a href=""> <span class="tag">{{$tag->TagName}}</span> <span>   </span> </a> 
                                @endforeach
                           </div>
                            <div class="col-md-6 poster">Posted by <a href="">{{$question->user->name}}</a></div>
                        </div>
                   </div>
                </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
