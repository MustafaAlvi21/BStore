@extends('layouts.app')
@section("title", "My Cart")
@section('content')

<section class="mainContent clearfix cartListWrapper">
  <div class="container">
    <div class="row">
    <?php $cartCount = false;?>
    @foreach(Cart::getContent() as $item)
      @if(!empty($item->id)) @else <?php $cartCount = true;?> @endif
    @endforeach
    @if($cartCount)
    <div class="col-12">
        <div class="cartListInner">
          <form action="#">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(Cart::getContent() as $item)
                  <tr>
                    <td class="">
                      <button type="button" class="close"><a href="{{ URL::to('remove_item/'.$item->id) }}" class="btn-btn-link"><i class="fa fa-trash text-danger"></i></a></button>
                      <span class="cartImage"><img src="data:image/jpeg; base64, {{ $item->attributes->img }}" style="width: 68px; height:74px;" alt="image"></span>
                    </td>
                    <td class="">{{ $item->name }}</td>
                    <td class="">Rs. {{ number_format($item->price, 2) }}</td>
                    <td class="count-input">
                      <a class="" href="{{ URL::to('my_cart/'.$item->id.'/decrease') }}"><i class="fa fa-minus"></i></a>
                      <input class="quantity" type="text" readonly="readonly" value="{{$item->quantity}}">
                      <a class="" href="{{ URL::to('my_cart/'.$item->id.'/increase') }}"><i class="fa fa-plus"></i></a>
                    </td>
                    <td class="">Rs. {{ number_format(((double) $item->price) * ((int) $item->quantity))  }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="updateArea">
              <div class="input-group">
                <h4>{{ Auth::user()->name }}'s Shopping</h4>
              </div>
              
            </div>
            <div class="row totalAmountArea">
              <div class="col-sm-4 ml-sm-auto">
                <ul class="list-unstyled">
                  <li>Sub Total <span class="font-weight-bold" style="color: black !important;">Rs. {{ number_format(\Cart::getSubTotal()) }}</span></li>
                </ul>
              </div>
            </div>
            <div class="checkBtnArea">
              <a href="{{ URL::to('checkout') }}" class="btn btn-primary btn-default mt-3">checkout<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
              <a href="{{ URL::to('clear_my_cart') }}" class="btn btn-primary btn-default mt-3">Empty Cart<i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
          </form>
        </div>
      </div>
    @else
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
          
            There are no items in your cart. <a href="{{ URL::to('products') }}" style="font-size: .8em;" class="text-primary"><i class="fa fa-reply" aria-hidden="true"></i> Shopping now!</a>.
        </div>
      </div>
      <div class="col-md-3"></div>
    @endif
        
    </div>
  </div>
</section>
@endsection