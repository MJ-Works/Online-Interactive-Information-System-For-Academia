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
                <div class="panel-heading"><strong id="heading">{{$question->Heading}}</strong> 
                    @auth
                        @if(Auth::user()->id == $question->user_id)
                            <a class="col-md-offset-10" href="{{ route('EditQuestion',$question->id) }}">Edit</a>
                        @endif
                    @endauth
                </div>

                <div class="panel-body">
                   <div class="col-md-1">
                   <form class="form-horizontal" method="POST" action="{{ route('QuestionVote',$question->id) }}"> {{ csrf_field() }} <button name = "submit" value = "UpVote" Type = "submit" class="btn btn-success vote">+</button></form>
                        <p class="votes">{{$question->votes}}</p>
                        <form class="form-horizontal" method="POST" action="{{ route('QuestionVote',$question->id) }}"> {{ csrf_field() }} <button name = "submit" value = "DownVote" Type = "submit" class="btn btn-danger vote">-</button></form>
                   </div>
                   <div class="col-md-10 col-md-offset-1 question">
                        <p><?php echo($question->Question) ?>
                        </p>
                   </div>
                   <div class="col-md-8 col-md-offset-8">Question By: <a href="{{ route('User',$question->user->id) }}">{{$question->user->name}}</a></div>
                   <div class="col-md-1">
                       <p>Tags:</p>
                   </div>
                   @foreach($question->tags as $tag)
                        <div class="col-md-2">
                        <a href="{{ route('QuestionByTag',$tag->id) }}"> <span class="tag">{{$tag->TagName}}</span> <span>   </span> </a> 
                        </div>
                    @endforeach
                </div>
                <div class="panel-body">
                    <h3>{{$question->answers->count()}} Answers</h3>
                </div>
                <hr>
                @foreach($allAnswer as $answer)
                <div class="panel-body">
                   <div class="col-md-1">
                        <form class="form-horizontal" method="POST" action="{{ route('AnswerVote',$answer->id, $question->id) }}"> {{ csrf_field() }} <button name = "submit" value= "UpVote" Type = "submit" class="btn btn-success vote">+</button></form>
                        <p class="votes">{{$answer->UpVote}}</p>
                        <form class="form-horizontal" method="POST" action="{{ route('AnswerVote',$answer->id, $question->id) }}"> {{ csrf_field() }} <button name = "submit" value="DownVote" Type = "submit" class="btn btn-danger vote">-</button></form>
                   </div>
                   @auth
                   @if(Auth::user()->id == $answer->user_id)
                        <a class="col-md-offset-10" href="{{ route('EditAnswer',$answer->id) }}">Edit</a>
                    @endif
                    @endauth
                   <div class="col-md-10 col-md-offset-1 question">
                        <p><?php echo($answer->Answer) ?>
                        </p>
                   </div>
                   @if($answer->user->id == $question->user_id)
                    <div class="col-md-8 col-md-offset-8">Comment By: <a href="{{ route('User',$answer->user->id) }}">{{$answer->user->name}}</a></div>
                    @else <div class="col-md-8 col-md-offset-8">Answer By: <a href="{{ route('User',$answer->user->id) }}">{{$answer->user->name}}</a></div>
                    @endif
                </div>
                <hr>
                @endforeach

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('Answer',$question->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            
                            <p for="Answer" class="col-md-10 col-md-offset-2 answer">Your Answer</label>
                        </div>
                        <div class="form-group{{ $errors->has('Answer') ? ' has-error' : '' }}">
                
                            <div class="col-md-10 col-md-offset-2">
                                <textarea id="Answer" type="text" class="form-control" name="Answer"></textarea>

                                @if ($errors->has('Answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
    selector: 'textarea',
    height: 250,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
</script>
@endsection
