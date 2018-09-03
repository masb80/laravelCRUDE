@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Well Come  </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            You are logged in!
    <h3> Create your blog post </h3>
    <a href="/posts/create" class ="btn btn-primary"> Create Posts </a>
    @if(count($po) > 0)
      <table class="table table-striped">
        <tr>
          <th> Table </th>
          <th> Edit  </th>
          <th>  Delete     </th>
        </tr>
        @foreach($po as $post)
          <tr>
            <td> {{$post-> title}} </td>
            <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-default" > Edit </a> </td>
            <td>
              {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete this post', ['class' => 'btn btn-danger'])}}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
    @else
      <h3> You have no post <h3>
      @endif
      </table>
    </div>
  </div>
</div>
</div>
</div>
  @endsection
