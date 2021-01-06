@extends('layouts.app')
@section("title", "Order Review")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>order review</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">Order Review</li>
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
                  <div class="col-4 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">Shipping</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="{{ URL::to('checkout') }}" class="progress-wizard-dot"></a>
                  </div>
  
                  <div class="col-4 progress-wizard-step complete fullBar">
                    <div class="text-center progress-wizard-stepnum">&nbsp;</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                  </div>
  
                  <div class="col-4 progress-wizard-step complete">
                    <div class="text-center progress-wizard-stepnum">Order Review</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="{{ URL::to('checkout_review') }}" class="progress-wizard-dot"></a>
                  </div>
                </div>

                <div class="page-header mb-4">
                  <h4>Order Review</h4>
                </div>

                <div class="cartListInner review-inner row">
                  <form action="#" class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th></th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::getContent() as $item)
                          <tr>
                            <td class="">
                              
                              <span class="cartImage"><img src="data:image/jpeg; base64, {{ $item->attributes->img }}"  style="width: 68px; height:74px;" alt="{{ $item->name }}"></span>
                            </td>
                            <td class="">{{ $item->name }}</td>
                            <td class=""></td>
                            <td class="count-input">
                              
                              <input class="quantity" type="text" value="{{ $item->quantity }}" disabled>
                              
                            </td>
                            <td class="">Rs. {{ number_format(((double) $item->price) * ((int) $item->quantity))  }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </form>
                </div>

                <div class="row shipping-info">
                  <div class="col-md-4">
                    <h5>Shipping Address</h5>
                    <address>
                      {{ Auth::user()->name }} <br>                          
                      {{ Session::get("checkout.address").', '.Session::get("checkout.city").' '.Session::get("checkout.zip_code") }}, Pakistan <br>
                      {{ Auth::user()->phone }} <br>
                      {{ Auth::user()->email }} <br>
                    </address>
                  </div>
                  <div class="col-md-4">
                    <h5>Shipping Method</h5>
                    <p>
                      <!-- Standard Ground (USPS) - $7.50 <br> -->
                      Delivered in 8-12 business days.
                    </p>
                  </div>
                  <div class="col-md-4">
                    <h5>Payment Method</h5>
                    <p>
                      Cash on Delivery 
                      
                    </p>
                  </div>
                </div>
                <div class="well well-lg clearfix">
                  <ul class="pager">
                  <li class="previous float-left"><a class="btn btn-secondary btn-default float-left" href="{{ URL::to('checkout') }}">back</a></li>
                    <li class="next"><a class="btn btn-primary btn-default float-right" href="{{ URL::to('thank_you_for_shopping') }}">Place Order </a></li>
                  </ul>
                </div>

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