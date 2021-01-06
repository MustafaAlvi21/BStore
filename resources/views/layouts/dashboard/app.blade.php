<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Catchmango') }}</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('web_assets/plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/plugins/selectbox/select_option1.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/plugins/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('web_assets/plugins/iziToast/css/iziToast.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/rs-plugin/css/settings.css') }}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/slick/slick.css') }}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/slick/slick-theme.css') }}" media="screen">

    <!-- Query UI -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/jquery-ui.css') }}" media="screen">

    <!-- linearicons -->
    <!-- <link rel="stylesheet" href="../../../cdn.linearicons.com/free/1.0.0/icon-font.min.css') }}"> -->

    <!-- CUSTOM CSS -->
    <link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web_assets/css/default.css') }}" id="option_color">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('web_assets/img/favicon.png')}}">



</head>

<body  class="body-wrapper">
    
    <!-- Preloader -->
    <div id="preloader" class="smooth-loader-wrapper">
      <div class="preloader_container">
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
        <div class="block"></div>
      </div>
    </div>

<!-- Main Container-->
<div class="main-wrapper">
  <!-- HEADER -->
  <div class="header clearfix headerV3">
    <!-- Top Bars -->
    @include('partials.topbar')
    
    <!-- Dashboard Navigation -->
    @include("partials.dashboard.navbar") 
  </div>
    <section class="lightSection clearfix pageHeader">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="page-title">
                <h2>ACCOUNT DASHBOARD</h2>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-right">
                <li>
                    <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">@yield('dashboard_title')</li>
                </ol>
            </div>
            </div>
        </div>
    </section>
     @yield('content') 
    <!-- Footer -->
    @include('partials.footer') 
</div>


    <script src="{{ asset('/web_assets/plugins/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/jquery/jquery-migrate-3.0.0.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/slick/slick.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/iziToast/js/iziToast.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/prismjs/prism.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/countdown/jquery.syotimer.js') }}"></script>
		<script src="{{ asset('/web_assets/plugins/velocity/velocity.min.js') }}"></script>
		<script src="{{ asset('/web_assets/js/custom.js') }}"></script>

    
</body>
</html>
