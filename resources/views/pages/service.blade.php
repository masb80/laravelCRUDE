@extends('layouts.app')

@section('content')
  <p > {{$title}}</p>

  @if(count($Myservices) > 0)
  <ul class="list-group">
      @foreach($Myservices as $service)
         <li class="list-group-item active">{{$service}} </li>
      @endforeach
    </ul>
  @endif

  <p>  This is the service page</p>
  <P> My first laravelAPP using tr and also created my own controller as php artisan make:controller PagesController and then sending the get request to the controller making   </P>
  <p> function index and then sending to view as a pages/index.blade.php </p>
  <p> This is from basic routing and controller tutorial and practic</p>
  <p> Now make the common layout and call in all .blade.php files. the body is a variable content and clall in here in a section and end section</p>
<p> Now declare a parameter in controller and then passing the parameter from controller through compact functin pr -> singn to the view, no work needed in routes</p>
@endsection
