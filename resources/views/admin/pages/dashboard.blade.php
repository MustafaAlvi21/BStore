@extends('admin.layouts.app')
@section("title", "Dashboard")
@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Welcome back, {{ Session::get('admin')->name }} </h4>
                </div>
                <div class="card-body mt-4">

                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

    
@endsection