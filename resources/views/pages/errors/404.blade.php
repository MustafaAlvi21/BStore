@extends('layouts.app')
@section("title", "404 Not Found")
@section('content')

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix notFound">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
        <a href="{{ URL::to('/') }}" class="navbar-brand pageLogo"><img src="{{ asset('web_assets/img/logo.png') }}" alt="logo catchmango"></a>
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <a class="btn btn-default" href="{{ URL::to('/') }}" role="button">Go to Home</a>
        </div>
    </div>
    </div>
</section>


@endsection