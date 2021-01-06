@extends('layouts.app')
@section("title", "Customer Orders")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>Customer Orders</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">Customer Orders</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix userProfile">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="innerWrapper">
                <div class="orderBox">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>Order Date</th>
                          <th>Items</th>
                          <th>Total</th>
                          <th>Order Last Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($customer_orders as $order)
                      <tr>
                          <td>#{{ $order->order_id }}</td>
                          <td>{{ Carbon\Carbon::parse($order->created_at)->format("D d, M Y") }}</td>
                          <td>
                            {{ DB::table('products')->join('orders', 'products.id', '=', 'orders.product_id')->where('orders.order_id', $order->order_id)->where('orders.vendor_id', Auth::user()->id)->get()->count() }}
                          </td>
                          <td>
                            <?php $total = 0; ?>
                            @foreach(DB::table('orders')
                            ->where('orders.order_id', $order->order_id)
                            ->select('orders.sub_total')
                            ->get() as $item)
                            <?php $total += $item->sub_total; ?>
                            @endforeach
                            <b>Rs. {{ number_format($total) }}<b/>
                          </td>
                          <td><span class="text-danger font-weight-bold">{{ Carbon\Carbon::parse($order->created_at)->addDays(12)->format('D d, M Y') }}</span></td>
                          <td><a href="{{ URL::to('customer_order/'.$order->order_id.'/view') }}" class="btn btn-sm btn-secondary-outlined">View</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection