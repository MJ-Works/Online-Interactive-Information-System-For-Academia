@extends('layouts.app')

@section('content')
<div class="container">
    <link href="{{ asset('css/multiple-select.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Question</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PostQuestion') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Department') ? ' has-error' : '' }}">
                            <label for="Department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                            <select id = "Department" name = "Department" class="form-control" require>
                                     @foreach($allDepartment as $department)
                                        <option value="{{$department->id}}">{{$department->DepartmentName}}</option>
                                    @endforeach
                            </select>

                                @if ($errors->has('Department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Heading') ? ' has-error' : '' }}">
                            <label for="Heading" class="col-md-4 control-label">Heading</label>

                            <div class="col-md-6">
                                <input id="Heading" type="text" class="form-control" name="Heading" required></input>

                                @if ($errors->has('Heading'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Heading') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Question') ? ' has-error' : '' }}">
                            <label for="Question" class="col-md-4 control-label">Question</label>

                            <div class="col-md-6">
                                <textarea id="Question" class="form-control" name="Question"></textarea>

                                @if ($errors->has('Question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('PrivateQuestion') ? ' has-error' : '' }}">
                            <label for="PrivateQuestion" class="col-md-4"></label>

                            <div class="col-md-6">
                                <div class="row" id="PrivateQuestionRadio">
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="PrivateQuestion" id="PrivateQuestionRadio1" value="1">
                                        <label class="form-check-label" for="PrivateQuestionRadio1">
                                            Private Question
                                        </label>
                                    </div>

                                     <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="PrivateQuestion" id="PrivateQuestionRadio2" value="0" checked>
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

                         <div class="form-group{{ $errors->has('Tags') ? ' has-error' : '' }}">
                            <label for="Tags" class="col-md-4 control-label">Tags</label>

                            <div class="col-md-6">
                                <select class="form-control" name = "Tags[]" multiple="multiple">
                                    @foreach($allTag as $tag)
                                        <option value="{{$tag->id}}">{{$tag->TagName}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('Tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Tags') }}</strong>
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
