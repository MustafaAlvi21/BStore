@extends('layouts.app')
@section("title", "View Order")
@section('content')
<style>

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<?php $total_p = 0; ?>
      <!-- LIGHT SECTION -->
      <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-6">
              <div class="page-title">
                <h2>View Order</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">View Order</li>
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

                <div class="page-header mb-4">
                  <h4>View Order</h4>
                </div>

                <div class="cartListInner review-inner row">
                  <form action="#" class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($my_orders as $item)
                          <tr>
                            <td colspan="6">
                                @if($item->status == 'shipped')
                                <div class="alert alert-success" role="alert">
                                  <h4 class="alert-heading">Note!</h4>
                                  <p class="text-success pt-2" style="font-size: .8em;">If you have receive order delivery, so mark this order as completed. <a href="{{ URL::to('manage_order/'.$item->p_order_id.'/customer') }}" style="font-size: .9em;" class="float-right text-white bg-success p-2">completed</a> </p>
                                  <hr>
                                  <p class="mb-0 text-dark" style="font-size: .8em;">If you did not receive order delivery, contact help center after order last date.</p>
                                </div>
                              @elseif($item->status == 'completed')
                                @if (DB::table('ratings')->join('products', 'products.id', '=', 'ratings.product_id')->where('ratings.user_id', Auth::user()->id)->select('ratings.id')->take(1)->get()->count() < 1)
                                <!-- Rating Button trigger modal -->
                                <button type="button" class="btn btn-success btn-md btn-block text-left" data-toggle="modal" data-target="#modelId">
                                  <b>Click here to feedback/rate this product</b>
                                </button>
                                @else
                                <div class="alert alert-success fade show" role="alert">
                                  <strong>Completed!</strong> This order marked as completed by you {{ Auth::user()->name }}.
                                </div>
                                @endif
                              @endif
                            </td>
                          </tr>
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
                            <td class="">Rs. {{ number_format($item->price) }}</td>
                            <td class="count-input">
                              
                              <input class="quantity" type="text" value="{{ $item->quantity }}" disabled>
                              
                            </td>
                            <td class="">Rs. {{ number_format(((double) $item->price) * ((int) $item->quantity))  }} <?php $total_p += ((double) $item->price) * ((int) $item->quantity); ?> </td>
                            <td>
                              @if ($item->status == 'pending')
                              <span class="badge badge-warning p-2">{{ $item->status }}</span>
                              @elseif($item->status == 'processing')
                              <span class="badge badge-primary p-2" style="background-color: #439fdb !important;">{{ $item->status }}</span>
                              @elseif($item->status == 'shipped')
                              <span class="badge badge-info p-2">{{ $item->status }}</span>
                              @elseif($item->status == 'canceled')
                              <span class="badge badge-danger p-2">{{ $item->status }}</span>
                              @elseif($item->status == 'completed')
                              <span class="badge badge-success p-2">{{ $item->status }}</span>
                              @endif
                            </td>
                          </tr>
                          
                          <?php $v_details = App\User::where('id',  $item->vendor_id)->distinct('name')->distinct('phone')->distinct('email')->first(); ?>
                          <tr class="bg-warning text-white">
                            <td class="">Vendor Deatils: </td>
                            <td>{{ $v_details->name }}</td>
                            <td class="text-white" colspan="2" class="">{{ $v_details->phone }}</td>
                            <td colspan="2">{{ $v_details->email }}</td>
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
                    <h5>Payment Method</h5>
                    <p>
                      Cash on Delivery 
                    </p>
                  </div>
                  <div class="col-md-4 text-right pr-3">
                    <h5>Total: 
                      <b>Rs. {{ number_format($total_p)  }}</b>
                    </h5>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>
                                
<!-- Rating Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!-- card -->
        <div class="card">
          <div class="card-header">
            <h4>Rate this product.</h4>
          </div>
          <div class="card-body">
              <form action="{{ URL::to('user_rating') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label class="b-2"> Starts</label><br><br>
                    <fieldset class="rating" id="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>  
                    <br><br>
                    @error('rating')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                  <hr class="bg-white">
                  <div class="form-group">
                    <label for="comment" class="pb-2">Comment</label>
                    <textarea class="form-control" name="comment" id="" rows="5" >{{ old('comment') }}</textarea>
                    @error('comment')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <input type="hidden" name="product_id" value="{{ $item->id }}">
                  
                  <div class="text-right">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                  
                </form>
          </div> 
        </div>
        <!-- card end -->
        
      </div>
    </div>
  </div>
</div>

@endsection