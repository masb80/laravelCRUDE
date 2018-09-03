@extends('layouts/app')

@section('content')
  <h1> Comment Editing post here </h1>
  <div class="p-3 mb-2 bg-success text-white">
    <p > First using edit in postcontroller.</p>
  </div>
  {!! Form::open(['action' => ['PostsController@update', $pe->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

  <div class="form-group">
    {{Form::label('title','Post Title')}}
    {{Form::text('title', $pe->title, ['class' => 'form-control', 'placeholder' => 'Post title'])}}
  </div>
  <div class="form-group">
    {{Form::label('body','Post Body')}}
    {{Form::textarea('body', $pe->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Post Body'])}}
  </div>
  <div class="form-group">
    {{Form::file('cover_image')}}
 {{--  {{Form::file('cover_image', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'cover_image'])}}
  --}}
  </div>
  <div class="form-group  text-md-center">
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  </div>

{{-- edit comments --}}
    <div class="form-group">
      {{Form::label('cbody','Comments')}}
      {{Form::textarea('cbody', $pe->cbody, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Comments'])}}
    </div>
  <div class="form-group  text-md-center">
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Add Comment', ['class' => 'btn btn-primary'])}}
  </div>

  {!! Form::close() !!}
@endsection
