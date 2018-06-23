@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <p>Home</p>
            <p><a href="">Tags</a></p>
            <p><a href="">Users</a></p>
            <p><a href="">Search</a></p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><strong id="heading">{{$question->Heading}}</strong></div>

                <div class="panel-body">
                   <div class="col-md-1">
                        <button class="btn btn-success vote">+</button>
                        <p class="votes">{{$question->votes}}</p>
                        <button class="btn btn-danger vote">-</button>
                   </div>
                   <div class="col-md-10 col-md-offset-1 question">
                        <p>{{strip_tags($question->Question)}}
                        </p>
                   </div>
                </div>

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
