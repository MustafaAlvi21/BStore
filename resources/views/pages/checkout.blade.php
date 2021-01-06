@extends('layouts.app')
@section("title", "Checkout")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>billing &amp; Shipping address</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li>
                  <a href="{{ URL::to('products') }}">shop</a>
                </li>
                <li class="active">Shipping Information</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix stepsWrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="innerWrapper clearfix stepsPage">
                <div class="row progress-wizard" style="border-bottom:0;">

                  <div class="col-4 progress-wizard-step active">
                    <div class="text-center progress-wizard-stepnum">Shipping </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="{{ URL::to('checkout') }}" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-4 progress-wizard-step disabled">
                    <div class="text-center progress-wizard-stepnum">&nbsp; </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <!-- <a href="" class="progress-wizard-dot"></a> -->
                  </div>

                  <div class="col-4 progress-wizard-step disabled">
                    <div class="text-center progress-wizard-stepnum">Review</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="{{ URL::to('checkout_review') }}" class="progress-wizard-dot"></a>
                  </div>
                </div>

                <form action="{{ URL::to('checkout_shipping') }}" class="row" method="POST" role="form">
                  @csrf
                  <div class="col-12">
                    <div class="page-header">
                      <h4>Shipping Address</h4>
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->name }}" id="">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Email</label>
                    <input type="email" class="form-control" readonly="readonly" value="{{ Auth::user()->email }}" id="">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" readonly="readonly" value="{{ Auth::user()->phone }}" id="">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address"
                    value="@if(Session::has('checkout')) {{ Session::get('checkout.address') }} @endif"
                    id="" required>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">City</label>
                    <div class="form-group row">
                      <div class="quick-drop col-12 selectOptions ">
                        <select name="city" class="form-control select-drop" required>
                          <option></option>
                          @if(Session::has("checkout"))
                          <option value="{{ Session::get('checkout.city') }}" selected>{{ Session::get('checkout.city') }}</option>
                          @endif
                          @foreach(DB::table('cities')->orderBy('name', 'asc')->get() as $city)
                          <option value="{{ $city->name }}">{{ $city->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Zip Code</label>
                    <input type="text" name="zip_code" class="form-control" id="" value="@if(Session::has('checkout')) {{ Session::get('checkout.zip_code') }} @endif" required>
                  </div>
                  <div class="col-12">
                    <div class="well well-lg clearfix" style="background-color: white;">
                      <ul class="pager">
                        <li class="next ">
                            <button type="submit" class="btn btn-primary btn-default float-right">
                                Continue <i class="fa fa-angle-right"></i>
                            </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-4">
              <div class="summery-box">
                <h4>Order Summery</h4>
                <p>Your cart summery Mr/Mrs <b>{{ Auth::user()->name }}</b>.</p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <span class="tag">Subtotal</span>
                    <span class="val">Rs. {{ number_format(\Cart::getSubTotal()) }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Shipping & Handling</span>
                    <span class="val">Rs. 00.00 </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Estimated Tax</span>
                    <span class="val">Rs. 00.00 </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Total</span>
                    <span class="val">Rs. {{ number_format(\Cart::getSubTotal()) }} </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection