@extends('layouts.app')

@section('content')
<div class="container">
    <link href="{{ asset('css/multiple-select.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Answer</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PostEditAnswer',$answer->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Answer') ? ' has-error' : '' }}">
                            <label for="Answer" class="col-md-4 control-label">Answer</label>

                            <div class="col-md-6">
                                <textarea value = "{{$answer->Answer}}" id="Answer" type="text" class="form-control" name="Answer" required>{{$answer->Answer}}</textarea>

                                @if ($errors->has('Answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                        </div>
                    </form>
                </div>
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
        'insertdatetime media table contextmenu paste code help wordcount',
        'image code'
    ],
    toolbar: 'insert | link image | code | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',

    
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
</script>
@endsection
