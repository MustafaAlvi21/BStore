@extends('layouts.app')
@section("title", "Checkout")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="page-title">
                <h2>review</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">review</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix stepsWrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="innerWrapper clearfix stepsPage">
                <div class="row justify-content-center order-confirm">
                  <div class="col-md-8 col-lg-6 text-center">
                    <h2>Thank You For Your Order</h2>
                    <span>You will receive an email of your order details</span>
                    <p class="">
                      Your Order: #{{ $uid }} <br>
                      Your order confirmation and receipt is sent to: <b>{{ Auth::user()->email }}</b> <br>
                      Your order will be shipped to: <br> {{ Session::get("checkout.address").', '.Session::get("checkout.city").' '.Session::get("checkout.zip_code") }}, Pakistan 
                    </p>
                    <a href="{{ URL::to('products') }}" class="btn btn-primary btn-default">Back to shop</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection