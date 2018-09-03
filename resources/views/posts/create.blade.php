@extends('layouts/app')

@section('content')
    <h1> Creating post here </h1>
      <div class="p-3 mb-2 bg-success text-white">
          <p > First using create in postcontroller.</p>
        </div>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
              {{Form::label('title','Post Title')}}
              {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post title'])}}
            </div>
            <div class="form-group">
              {{Form::label('body','Post Body')}}
              {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Post Body'])}}
              <div class="form-group">
                {{Form::file('cover_image')}}
              {{--  {{Form::file('cover_image', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'cover_image']) --}}
              </div>
            </div>
              <div class="form-group  text-md-center">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
              </div>

        {!! Form::close() !!}


          {{--
              <form method="POST" action="{{action('PostsController@store')}}" enctype="multipart/form-data" >
                  <div class="form-group">
                    <label for="" class="col-sm-8 col-form-label text-md-left">{{ __('Posts') }}</label>


                      <textarea class="form-control" rows="1" name="description" maxlength="" placeholder="Title">
                      </textarea>
                  </div>
                  <div class="form-group">
                      <label for="posts" class="col-sm-12 col-form-label text-md-left">{{ __('Body') }}</label>
                      <textarea class="form-control" rows="" name="description" maxlength="" maxwidth="" placeholder="Body">
                      </textarea>
                    </div>
                    <div class="form-group  text-md-center">
                      <button type="submit" name="button" class="btn btn-primary">Submit</button>
                    </div>

              </form>
            --}}


              <div class="p-3 mb-2 bg-success text-white">
              <p > Taking a form as laravel 5.5 and making text area as this version and also taking method POST and action is in PostsController </p>
            </div>
            <div class="col-md-8">
             <a class="btn btn-danger" href="/posts" >Go Back in Blog</a>
          </div>

@endsection
