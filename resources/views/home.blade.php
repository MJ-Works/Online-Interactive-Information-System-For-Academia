@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <p>Home</p>
            <p><a href="{{ route('Home') }}">Home</a></p>
            <p><a href="{{ route('Tags') }}">Tags</a></p>
            <p><a href="{{ route('Departments') }}">Departments</a></p>
            <p><a href="{{ route('Search') }}">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Top Questions</strong></div>
                @foreach($allQuestion as $question)
                    @auth
                    @if(($question->PrivateQuestion =='1' && $question->departments_id == Auth::user()->departments_id) || $question->PrivateQuestion =='0' || ($question->PrivateQuestion =='1' && $question->user_id == Auth::user()->id))
                        <div class="panel-body">
                        <div class="col-md-2 votes">{{$question->votes}} Votes</div>
                        <div class="col-md-2 answer">{{$question->answers->count()}} Answer</div>
                        <div class="col-md-8 question">
                                <a href="{{url('viewQuestion',$question->id)}}">{{$question->Heading}}</a>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach($question->tags as $tag)
                                        <a href="{{ route('QuestionByTag',$tag->id) }}"> <span class="tag">{{$tag->TagName}}</span> <span>   </span> </a> 
                                        @endforeach
                                </div>
                                    <div class="col-md-6 poster">Posted by <a href="{{ route('User',$question->user->id) }}">{{$question->user->name}}</a></div>
                                </div>
                        </div>
                        </div>
                    @endif
                    @endauth
                    @guest
                        @if(($question->PrivateQuestion !='1'))
                            <div class="panel-body">
                            <div class="col-md-2 votes">{{$question->votes}} Votes</div>
                            <div class="col-md-2 answer">{{$question->answers->count()}} Answer</div>
                            <div class="col-md-8 question">
                                    <a href="{{url('viewQuestion',$question->id)}}">{{$question->Heading}}</a>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach($question->tags as $tag)
                                            <a href="{{ route('QuestionByTag',$tag->id) }}"> <span class="tag">{{$tag->TagName}}</span> <span>   </span> </a> 
                                            @endforeach
                                    </div>
                                        <div class="col-md-6 poster">Posted by <a href="{{ route('User',$question->user->id) }}">{{$question->user->name}}</a></div>
                                    </div>
                            </div>
                            </div>
                        @endif
                    @endguest
                @endforeach
        </div>
    </div>
</div>
@endsection
