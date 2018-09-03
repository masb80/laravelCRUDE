<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaravelAPP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

                        @include('inc.nav-bar')


                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->



        <main class="py-4">
              <div class="container">
              @include('inc.message')
              @yield('content')

            </div>
            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script>
          CKEDITOR.replace( 'article-ckeditor' );
      </script>
        </main>
    </div>
</body>

{{--
<footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright @fytics: Samad Bhuiyan</span>
      </div>
    </footer>
  --}}
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">
      <div class="container">
        <!-- Copyright -->
        <div class="footer-copyright text-right py-3">© 2018 Copyright:
          <a href=""> samad@fytics.com</a>
        </div>
      </div>
      <!-- Copyright -->

    </footer>
  <!-- Footer -->
</html>
