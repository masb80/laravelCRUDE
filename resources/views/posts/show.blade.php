@extends('layouts/app')

@section('content')
 <h1>{{$pe->title}} </h1>
 <img style ="max-width: 10%" src="/storage/cover_images/{{$pe->cover_image}}"
<div class="container">
  <div class="p-3 mb-2 bg-primary text-white">
    <p> Next taking the id from index.blade using href and then using controller Post return the id in the URL</p>
    <p> Next sending the id to the show.blade.php using a varibale in controller ie PostsController.  </p>
    <p> For delete no more blade clalling writing code in show.blade.php directly  </p>
  </div>
    <div>
    <h3> Body is,   {{$pe->body}} </h3> <br>
    <h3> ID is,     {{$pe->id}} </h3>
        <h3> Cooment is: </h3>
     <h1>  {{$pe->cbody}} by  {{$pe->user->name}} </h1>
  </div>
      <div>
       <small> Written on {{$pe->created_at}} by {{$pe->user->name}}</small> <br>

  </div>
  <hr>
  <div>
      @if(! Auth::guest()) {{-- if he not guest that is user --}}
          @if(Auth::user()->id == $pe->user_id)  {{--  if user == post user id same --}}

            <!-- for delete no more blade clalling writing code below in show.blade.php directly -->
            {!! Form::open(['action' => ['PostsController@destroy', $pe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            <a class="btn btn-primary" href="/posts/{{$pe->id}}/edit" >Edit</a>
            {{Form::submit('Delete this post',  ['class' => 'btn float-right btn-danger '])}}

          @endif
          <hr>
          <a class="btn float-centre btn-primary" href="/posts/{{$pe->id}}/cedit" >Comments</a>
          {!! Form::close() !!}
{{--
          {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
              {{Form::label('cbody','Comments')}}
              {{Form::textarea('cbody', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Comments'])}}
            </div>
          <div class="form-group  text-md-center">
            {{Form::submit('Add Comment', ['class' => 'btn btn-primary'])}}
          </div>

          {!! Form::close() !!}
--}}
     @endif
  </div>
  <hr>
  <a class="btn btn-danger" href="/posts" >Go Back</a> <br>
</div>
@endsection
