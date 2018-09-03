

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-">
     <a class="navbar-brand" href="/"{{ config('app.name', 'LaravelAPP') }}></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarsExampleDefault">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item ">
           <a class="nav-link enable" href="/"{{ config('app.name', 'LaravelAPP') }}>Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link enable" href="/about"{{ config('app.name', 'LaravelAPP') }}>About</a>
         </li>
         <li class="nav-item">
           <a class="nav-link enable" href="/service"{{ config('app.name', 'LaravelAPP') }}>Services</a>
         </li>

         <li class="nav-item">
           <a class="nav-link enable" href="/posts"{{ config('app.name', 'LaravelAPP') }}>Blog</a>
         </li>
  {{--
         <li class="nav-item">
           <a class="nav-link enable" href="/posts/create/"{{ config('app.name', 'LaravelAPP') }}>Create Post</a>
         </li>


         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="/dashboard" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
           <div class="dropdown-menu" aria-labelledby="dropdown01">
             <a class="dropdown-item" href="/deshboard"{{ config('app.name', 'LaravelAPP') }}>Deshboard</a>
             <a class="dropdown-item" href="/deshboard"{{ config('app.name', 'LaravelAPP') }}>Login</a>
             <a class="dropdown-item" href="/deshboard"{{ config('app.name', 'LaravelAPP') }}>Logout</a>
           </div>
         </li>
  --}}
       </ul>
         <ul class="navbar-nav ml-auto">
          <li class="nav-item">
         @guest
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
             </li>

         @else
             <li class="nav-item dropdown">
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }} <span class="caret"></span>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href ="/deshboard" {{ config('app.name', 'LaravelAPP') }}>  Dashboard </a>
                {{--}      <a class="dropdown-item" href="/posts"{{ config('app.name', 'LaravelAPP') }}>Blog</a> --}}
                     <a class="dropdown-item" href="{{ route('logout') }}"

                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </div>
             </li>
             </li>
           </ul>
         @endguest


       </ul>
       </div>
   </nav>
