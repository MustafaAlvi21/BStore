<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link href="{{ asset('web_assets/plugins/prismjs/prism.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/slick/slick.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/slick/slick-theme.css') }}" media="screen">


    <!-- CUSTOM CSS -->
    <link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web_assets/css/default.css') }}" id="option_color">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('web_assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('web_assets/css/icon-font.min.css') }}" id="option_color">
    <style type="text/css">
      .ui-datepicker-calendar {
        display: none;
      }
      .ui-datepicker-month {
        display: none;
      }
      .ui-datepicker-next,.ui-datepicker-prev {
        display:none;
      }
      ::-webkit-scrollbar {
        width: 10px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1; 
      }
      
      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888; 
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555; 
      }
      @media screen and (max-width: 600px) {
          #hide-search-btn-in-mobile {
            visibility: hidden;
            display: none;
          }
        }
  </style>
</head>
<body class="body-wrapper">


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
    <div class="main-wrapper">

      <!-- HEADER -->
      <div class="header clearfix headerV3">

        @include('partials.topbar')

        @include('partials.navbar')


      </div>

    @yield('content')

    @include('partials.footer')

    </div>


    <script src="{{ asset('web_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/jquery/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/slick/slick.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/iziToast/js/iziToast.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/prismjs/prism.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/countdown/jquery.syotimer.js') }}"></script>
    <script src="{{ asset('web_assets/plugins/velocity/velocity.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/custom.js') }}"></script>
    <!-- Jquery UI -->
		<script src="{{ asset('/web_assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript">
      $(function() {
          $('#birth_year').datepicker({
              changeYear: true,
              showButtonPanel: true,
              yearRange: "-69:+0",
              dateFormat: 'yy',
              onClose: function(dateText, inst) { 
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  $(this).datepicker('setDate', new Date(year, 1));
              }
          });
      $(".date-picker-year").focus(function () {
              $(".ui-datepicker-month").hide();
          });
      });
      
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pro-pic')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        
    </script>
</body>
</html>
