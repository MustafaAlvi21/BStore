@extends('layouts.app')
@section("title", "Contact Us")
@section('content')
<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="page-title">
            <h2>Contact Us</h2>
            </div>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-right">
            <li>
                <a href="{{ URL::to('/') }}">Home</a>
            </li>
            <li class="active">Contact Us</li>
            </ol>
        </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix aboutUsInfo">
    <div class="container">
        <div class="row">
        <div class="col-md-3 order-sm-12"></div>
        <div class="col-md-6 order-sm-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ Session::get('msg') }}
                    </div>
                    @endif
                    <form action="{{ URL::to('getContactData') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Email Address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                              <input type="text" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" id="subject" name="subject" placeholder="Subject">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                               <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Your message">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-primary">Send message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 order-sm-12"></div>
        </div>
    </div>
</section>
@endsection