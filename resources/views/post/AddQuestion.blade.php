@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Question</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                            <select id = "department" name = "department" class="form-control" require>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
                            <label for="heading" class="col-md-4 control-label">Heading</label>

                            <div class="col-md-6">
                                <input id="heading" type="text" class="form-control" name="heading" required></input>

                                @if ($errors->has('heading'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('heading') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="question" class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <textarea id="question" type="text" class="form-control" name="question" required></textarea>

                                @if ($errors->has('question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('PrivateQuestion') ? ' has-error' : '' }}">
                            <label for="PrivateQuestion" class="col-md-4"></label>

                            <div class="col-md-6">
                                <div class="row" id="PrivateQuestion">
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="PrivateQuestionRadio" id="PrivateQuestionRadio1" value="option1">
                                        <label class="form-check-label" for="PrivateQuestionRadio1">
                                            Private Question
                                        </label>
                                    </div>

                                     <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="PrivateQuestionRadio" id="PrivateQuestionRadio2" value="option1" checked>
                                        <label class="form-check-label" for="PrivateQuestionRadio2">
                                            Public Question
                                        </label>
                                    </div>
                                </div>

                                @if ($errors->has('PrivateQuestion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('PrivateQuestion') }}</strong>
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
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
</script>

@endsection
