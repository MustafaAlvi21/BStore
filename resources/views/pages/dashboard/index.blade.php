@extends('layouts.dashboard.app')
@section("title", "Dashboard")
@section("dashboard_title", "ACCOUNT DASHBOARD")

@section('content')


<section class="mainContent clearfix userProfile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="innerWrapper">
                <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    Warning! You have one unpaid order.
                </div>
                 -->
                <h3>Welcome <span>{{ Auth::user()->name }}</span></h3>
                <p>{{ Auth::user()->profile_info }}</p>
                    <div class="card">
                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mt-2" style="background-color: #ffb548 !important;border-radius:5px;">
                                        <div class="card-body">
                                            <h4 class="card-title text-white">Skills
                                            
                                            <span class="badge badge-success">
                                            <strong>{{ count(App\skill::where("user_id", Auth::user()->id)->get()) }}</strong>
                                            </span>
                                            </h4>
                                            <p class="card-text text-white">Your total skills.</p>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="card mt-2" style="background-color: #ffb548 !important;border-radius:5px;">
                                        <div class="card-body">
                                            <h4 class="card-title text-white">Products
                                            
                                            <span class="badge badge-success">
                                            <strong>{{ count(App\product::where("user_id", Auth::user()->id)->get()) }}</strong>
                                            </span>
                                            </h4>
                                            <p class="card-text text-white">Your total products.</p>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mt-2" style="background-color: #ffb548 !important;border-radius:5px;">
                                        <div class="card-body">
                                            <h4 class="card-title text-white">My Orders
                                            
                                            <span class="badge badge-success">
                                            <strong>{{ 
                                            count(DB::table('users')
                                            ->join('orders', 'users.id', '=', 'orders.user_id')
                                            ->select('orders.id')
                                            ->groupBy('orders.order_id')
                                            ->where('orders.status', '!=', 'completed')
                                            ->where('users.id', Auth::user()->id)
                                            ->get()) }}</strong>
                                            </span>
                                            </h4>
                                            <p class="card-text text-white">Your ongoing orders.</p>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection