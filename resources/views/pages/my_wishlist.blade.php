@extends('layouts.app')
@section("title", "My Wishlist")
@section('content')

      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>My Wishlist</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">My Wishlist</li>
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
              <div class="innerWrapper clearfix">

                <div class="page-header mb-4">
                  <h4>{{ Auth::user()->name }}'s <i>Wishlist</i></h4>
                </div>

                @if($my_wishlists->count() > 0)
                <div class="cartListInner review-inner row">
                    <form action="#" class="col-sm-12 mb-4">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th></th>
                                <th>Price</th>
                                <th>Add to Cart</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_wishlists as $item)
                            <tr>
                                <td class=""><a href="{{ URL::to('wishlist/'.$item->wishlist_id.'/remove') }}" title="Remove" class="btn btn-default text-danger">x</a></td>
                                <td class="">
                                
                                <?php $count = 0;  ?>
                                @foreach(App\image::where("product_id", $item->id)->where("active_status", "active")->get() as $img)
                                    @if($count == 0)
                                      <span class="cartImage"><img src="data:image/jpeg; base64, {{ $img->image }}"  style="width: 68px; height:74px;" alt="{{ $item->name }}"></span>
                                    @endif                          
                                <?php $count++; ?>
                                @endforeach

                                </td>
                                <td class="">{{ $item->name }}</td>
                                <td class="">Rs. {{ number_format((double) $item->price)  }}</td>
                                <td class=""><a href="{{ URL::to('add-cart/'.$item->id) }}" title="Add Cart" class="btn btn-default"><i class="fa fa-shopping-basket text-warning"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </form>
                </div>
                @else
                <div class="alert alert-warning fade show text-center" role="alert">
                    Your wishlist is empty.
                </div>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection