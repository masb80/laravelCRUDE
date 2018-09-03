@extends('layouts/app')

@section('content')
  <h1> Posts from Databases using tinker and Eloquent and also mysql</h1>
  <h1> Posts from Databases using mysql for practice but mainly use above</h1>
  <div class="p-3 mb-2 bg-primary text-white">
  <p > first making model and then using tinker App\model_name and created data on table. now calling from Post model and sending to index.balde.php by using with(variable_name, variable) and loop through each of the variables in here.</p>
</div>
<div class="p-3 mb-2 bg-primary text-white">
  <p> Next taking the id from index.blade using href and then using controller Post return the id in the URL</p>
  <p> Next sending the id to the show.blade.php using a varibale in controller ie PostsController.  </p>
  <p> Next to use the my sql need to load DB library in controller ie PostsController and write the sql query  as before in there.  </p>

</div>
<div class="row">
  <div class="col-md-4" col-sm-4>
  {{--  <img style ="max-width: 10%" src="/storage/cover_images/{{$po->cover_image}}" --}}
  </div>
</div>
<div class="row">
  <div class="col-md-8" col-sm-8>
    @if(count($po) > 0)
      @foreach($po as $post)
        <h3><a href="/posts/{{$post->id}}"> {{$post->title}} </a><br>
          <small> Written on {{$post->created_at}} by {{$post->user->name}}</small>
          {{-- <h3><a href="/posts/{{$post->id}}"> {{$post->body}} </a> <br>
          <small> Written on {{$post->created_at}}</small>
          --}}
        @endforeach
        {{$post->links}}
      @else
        <h3> No variable </h3>
      @endif
    </div>
  </div>

@endsection
