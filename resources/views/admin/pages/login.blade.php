@extends('admin.layouts.app')
@section("title", "Login")
@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <hr class="bg-success pt-4 border-primary">
                <div class="card-header">
                    <h4>Admin Login </h4>
                </div>
                <div class="card-body mt-4">
                    @if (Session::has('success_msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{ Session::get('success_msg') }}
                        </div>
                    @elseif(Session::has('error_msg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{ Session::get('error_msg') }}
                        </div>
                    @endif
                    <form action="{{ URL::to('logindata') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="email" class="text-success">Email Address</label>
                          <input type="email" class="form-control font-weight-bold" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-success">Password</label>
                            <input type="password" class="form-control font-weight-bold" name="password" id="password" placeholder="*********">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success font-weight-bold btn-block">L o g i n</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
    
@endsection