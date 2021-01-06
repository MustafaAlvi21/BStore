@extends('layouts.app')
@section("title", "My Orders")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>My Orders</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">My Orders</li>
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
                          <th>Order ID</th>
                          <th>Order Date</th>
                          <th>Items</th>
                          <th>Total Price</th>
                          <th>Order Last Date</th>
                          {{--  <th></th>  --}}
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                        <tr>
                          <td>#{{ $order["id"] }}</td>
                          <td>{{ Carbon\Carbon::parse($order["date"])->format("D d, M Y") }}</td>
                          <td>{{ $order["items"] }}</td>
                          <td><b>Rs. {{ number_format($order["total"]) }}<b/></td>
                          <td><span class="text-danger font-weight-bold">{{ Carbon\Carbon::parse($order["date"])->addDays(12)->format('D d, M Y') }}</span></td>
                          {{--  <td>
                              @if ($order['status'] == 'pending')
                              <span class="badge badge-warning p-2">{{ $order['status'] }}</span>
                              @elseif($order['status'] == 'processing')
                              <span class="badge badge-primary p-2" style="background-color: #439fdb !important;">{{ $order['status'] }}</span>
                              @elseif($order['status'] == 'shipped')
                              <span class="badge badge-info p-2">{{ $order['status'] }}</span>
                              @elseif($order['status'] == 'canceled')
                              <span class="badge badge-danger p-2">{{ $order['status'] }}</span>
                              @elseif($order['status'] == 'completed')
                              <span class="badge badge-success p-2">{{ $order['status'] }}</span>
                              @endif
                          </td>  --}}
                          <td><a href="{{ URL::to('my_order/'.$order['id'].'/view') }}" class="btn btn-sm btn-secondary-outlined">View</a></td>
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