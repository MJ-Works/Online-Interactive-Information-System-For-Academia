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
                <div class="panel-heading"><strong id="heading">What is the definition of activation on subjugation</strong></div>

                <div class="panel-body">
                   <div class="col-md-1">
                        <button class="btn btn-success vote">+</button>
                        <p class="votes">-10</p>
                        <button class="btn btn-danger vote">-</button>
                   </div>
                   <div class="col-md-10 col-md-offset-1 question">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nisi at, distinctio deserunt similique repellat sit suscipit neque consectetur culpa excepturi omnis beatae rerum ab deleniti. Necessitatibus impedit dolorem ipsum?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt laboriosam quia dignissimos harum maxime odit, doloribus dolorem magnam earum iure, esse praesentium, repellendus ipsam nemo voluptate vel veniam omnis eveniet.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui itaque ipsum eligendi saepe nesciunt at velit excepturi sequi dolorum dignissimos similique, mollitia, temporibus commodi. Labore consequatur sint distinctio possimus? Dolore?
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat itaque debitis deserunt excepturi iusto voluptates dolores accusantium nostrum quo, fuga distinctio qui deleniti explicabo illo omnis? Harum aliquam odio fugiat!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis cumque qui est. Sint cum nisi, corporis adipisci quod asperiores enim autem ea ipsam dicta, ut architecto iusto explicabo labore incidunt.
                        </p>
                   </div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            
                            <p for="Answer" class="col-md-10 col-md-offset-2 answer">Your Answer</label>
                        </div>
                        <div class="form-group{{ $errors->has('Answer') ? ' has-error' : '' }}">
                
                            <div class="col-md-10 col-md-offset-2">
                                <textarea id="Answer" type="text" class="form-control" name="Answer" required></textarea>

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
