@extends('layouts.app')
@section("title", "Customer Order View")
@section('content')
<?php $total_p = 0; ?>
      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>customer Order</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">customer Order</li>
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
                        @foreach($customer_orders as $item)
                          @if($item->status == 'completed')
                            <tr class="bg-success text-white">
                              <td colspan="5">
                                  <small>This order marked as completed by customer.</small>
                              </td>
                            </tr>
                          @elseif($item->status == 'pending')
                            <tr class="bg-secondary text-white">
                              <td colspan="5">
                                  <small>Order current status {{ $item->status }}</small>
                              </td>
                            </tr>
                          @else
                            <tr class="bg-info text-white">
                              <td colspan="5">
                                  <small>Order marked as {{ $item->status }}</small>
                              </td>
                            </tr>
                          @endif
                          <tr>
                            <td class="">
                              <?php $count = 0;  ?>
                              @foreach(App\image::where("product_id", $item->id)->where("active_status", "active")->get() as $img)
                                  @if($count == 0)
                                    <span class="cartImage"><img src="data:image/jpeg; base64, {{ $img->image }}"  style="width: 68px; height:74px;" alt="{{ $item->name }}"></span>
                                  @else @endif
                                <?php $count++; ?>
                              @endforeach
                            </td>
                            <td class="">{{ $item->name }}</td>
                            <td class=""></td>
                            <td class="count-input">
                              <input class="quantity" type="text" value="{{ $item->quantity }}" disabled>
                            </td>
                            <td class="">Rs. {{ number_format(((double) $item->price) * ((int) $item->quantity))  }} <?php $total_p += ((double) $item->price) * ((int) $item->quantity); ?> </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </form>
                </div>

                <div class="row shipping-info">
                  <div class="col-md-4">
                    <h5>Shipping Method</h5>
                    <p>
                      Delivered in 8-12 business days.
                    </p>
                  </div>
                  <div class="col-md-4">
                      <h5>Order Date</h5>
                      <p class="font-weight-bold">
                        {{ Carbon\Carbon::parse($customer_orders[0]->order_date)->format('M d, Y') }}
                      </p>
                  </div>
                  <div class="col-md-4">
                    <h5>Payment Method</h5>
                    <p>
                      Cash on Delivery 
                    </p>
                  </div>
                </div>
                @if($customer_orders[0]->status == "shipped")
                @elseif($customer_orders[0]->status != "completed")
                  <div class="well well-lg clearfix">
                      <ul class="pager">
                      <li class="previous float-left pt-3">
                      <h4 class="text-dark">Mark as</h4> 
                      </li>
                      @if($customer_orders[0]->status == "pending")
                      <li class="next"><a class="btn btn-primary btn-default float-right" href="{{ URL::to('manage_order/'.$id) }}">Processing </a></li>
                      @elseif($customer_orders[0]->status == "processing")
                      <li class="next"><a class="btn btn-primary btn-default float-right" href="{{ URL::to('manage_order/'.$id) }}">Shipped </a></li>
                      {{--  @elseif($customer_orders[0]->status == "shipped")  --}}
                      {{--  <li class="next"><a class="btn btn-primary btn-default float-right" href="{{ URL::to('manage_order/'.$id) }}">Completed </a></li>  --}}
                      @endif
                      </ul>                  
                  </div>
                @endif

              </div>
            </div>
            <div class="col-md-4">
            <div class="summery-box">
                <h4>Order Summery</h4>
                <hr>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <span class="tag">Name</span>
                    <span class="val">{{ DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')->where('order_id', $customer_orders[0]->order_id)->select('users.*')->first()->name }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Phone</span>
                    <span class="val">{{ DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')->where('order_id', $customer_orders[0]->order_id)->select('users.*')->first()->phone }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Email</span>
                    <span class="val">{{ DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id')->where('order_id', $customer_orders[0]->order_id)->select('users.*')->first()->email }}</span>
                  </li>
                  <li class="">
                    <span class="tag">Address</span><br><hr>
                    <span class="val">{{ DB::table('deliveries')->join('orders', 'orders.order_id', '=', 'deliveries.order_id')->select()->first()->address }}.</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Subtotal</span>
                    <span class="val">Rs. {{ number_format($total_p) }}</span>
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
                    <span class="tag">Order Last Date</span>
                    <span class="val text-danger font-weight-bold">{{ Carbon\Carbon::parse($customer_orders[0]->order_date)->addDays(12)->format('M d, Y') }} </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Total</span>
                    <span class="val">Rs. {{ number_format($total_p) }} </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection