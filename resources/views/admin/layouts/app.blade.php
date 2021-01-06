<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Catchmango') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>
<body>
    <div id="app">
      @if (Route::getFacadeRoot()->current()->uri() != 'adminlogin')
      <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Catchmango') }}
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ URL::to('admindashboard') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ URL::to('slider') }}" class="nav-link">Slider</a></li>
                    {{-- <li class="nav-item"><a href="{{ URL::to('contacts') }}" class="nav-link">Contacts</a></li> --}}
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link text-dark" href="#">{{ Session::get('admin')->name }}</a>
                      </li>
                      <li class="nav-item"><a href="" class="nav-link">|</a></li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ URL::to('adminlogout') }}">Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

      @endif
      <div class="py-4">
          @yield('content')
      </div>
        
    </div>
    <div class="container-fluid bg-white p-0" id="footer">
        <hr class="bg-success pt-1">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="text-center font-weight-bold">
                    <h4 class="text-muted">Catchmango &copy; <script>document.write(new Date().getFullYear());</script>, All right reserved.</h4>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <hr class="bg-success pt-1">
    </div>
</body>
</html>
