@extends('layouts.app')
@section("title", "Product Details")
@section('content')

<style>
.scroll-rating{
height:28em;
    overflow-y: scroll;
    overflow-x: hidden;
    
}
</style>

<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="page-title">
            <h2>Product</h2>
            </div>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb pull-right">
            <li>
                <a href="{{ URL::to('/') }}">Home</a>
            </li>
            <li class="active">Product</li>
            </ol>
        </div>
        </div>
    </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="mainContent clearfix">
    <div class="container">
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Request!</strong> {{ Session::get('msg') }}
        </div>
        @endif

        <div class="row singleProduct">
        <div class="col-md-12">
            <div class="media flex-wrap">
            <div class="media-left productSlider">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php $count = 0;  ?>
                    @foreach(App\image::where("product_id", $product->id)->where("active_status", "active")->get() as $img)
                        @if($count == 0)

                      <div class="carousel-item active" data-thumb="<?php echo $count?>">
                        <img src="data:image/jpeg; base64, {{ $img->image }}" style="width: 400px;height: 476px;">
                      </div>
                        @else
                        <div class="carousel-item" data-thumb="<?php echo $count?>">
                            <img src="data:image/jpeg; base64, {{ $img->image }}" style="width:460px !important; height:570px !important;">
                        </div>
                            
                        @endif
                      <?php $count++; ?>
                    @endforeach
                    </div>
                  </div>
                <div class="clearfix">
                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                    <?php $count = 0;  ?>
                    @foreach(App\image::where("product_id", $product->id)->where("active_status", "active")->get() as $img)
                        <div data-target="#carousel" data-slide-to="<?php echo $count?>" class="thumb"><img style="width:106px !important; height:106px !important;" src="data:image/jpeg; base64, {{ $img->image }}"></div>
                    <?php $count++; ?>
                    @endforeach
                    </div>
                    <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                </div>
            </div>
            <div class="media-body">
                <ul class="list-inline">
                <li><a href="{{ URL::to('/') }}"><i class="fa fa-reply" aria-hidden="true"></i>Continue Shopping</a></li>
                <!--<li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Share This</a></li>-->
                </ul>
                <h2>{{ $product->name }} <span class="text-muted " style="font-size: .4em !important;"><em>{{ App\category::where("id", $product->category_id)->first()->name }}</em></span></h2>
                <h3>Rs. {{ number_format($product->price, 2) }}</h3>
                <!-- <p>desc</p> -->
                <!-- <span class="quick-drop">
                <select name="guiest_id3" id="guiest_id3" class="select-drop">
                    <option value="0">Size</option>
                    <option value="1">Small</option>
                    <option value="2">Medium</option>
                    <option value="3">Big</option>
                </select>
                </span> -->
                <form action="{{ URL::to('add-cart/'.$product->id) }}">
                    @csrf
                <span class="quick-drop resizeWidth">
                <select name="qty" id="qty" class="select-drop">
                    <option class="pl-2" value="1" selected>Qty</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                </span>
                <div class="btn-area">
                
                 <button type="submit" class="btn btn-primary btn-default">
                 Add to cart <i class="fa fa-angle-right" aria-hidden="true"></i>
                 </button>
                 <a class="btn btn-primary" href="{{ URL::to('wishlist/'.$product->id) }}" >Add to Wishlist<i class="fa fa-heart-o"></i></a>
                
                @if(App\exchange::where('user_id', $user_details->id)->where('product_id', $product->id)->get()->count() == 0)
                @if(App\product::where('user_id', $user_details->id)->where('id', $product->id)->get()->count() != 1)
                 <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exchange_p">
                    Exchange Product
                </button>
                @endif
                @endif
                
                </div>
                </form>
                <div class="tabArea">
                <ul class="nav nav-tabs bar-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#user_info">User Info</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact_details">Contact Details</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rating">Rating @if(DB::table('ratings')->join('users', 'users.id', '=', 'ratings.user_id')->where('ratings.product_id', $product->id)->select('ratings.id', 'ratings.comment', 'ratings.created_at', 'users.name', 'users.avatar' )->get()->count() > 0) <span class="badge badge-pill badge-success p-2">{{ DB::table('ratings')->join('users', 'users.id', '=', 'ratings.user_id')->where('ratings.product_id', $product->id)->select('ratings.id', 'ratings.comment', 'ratings.created_at', 'users.name', 'users.avatar' )->get()->count() }}</span>@endif  </a></li>
                </ul>
                <div class="tab-content">
                    <div id="user_info" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-3">
                            @if (empty($user_details->avatar))
                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                            @else
                            <img src="data:image/jpeg; base64, {{ $user_details->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                            @endif
                        </div>
                        <div class="col-md-9">
                        <h5 class="pt-2">{{ $user_details->name}}</h5>
                        
                        <p>
                        {{ $user_details->profile_info }}
                        </p>
                        <hr>
                        <ul class="unstyled">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user_details->state }}, {{ $user_details->country }}</li>
                        </ul>
                        </div>
                    </div>
                    
                    </div>
                    <div id="contact_details" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <ul class="unstyled">
                                    <hr>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{ $user_details->email }}" style="color:gray;">{{ $user_details->email }}</a></li>
                                    <hr>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> {{ $user_details->phone }}</li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div id="rating" class="tab-pane fade scroll-rating pr-2">
                        @if (DB::table('ratings')->join('users', 'users.id', '=', 'ratings.user_id')->where('ratings.product_id', $product->id)->select('ratings.id', 'ratings.comment', 'ratings.created_at', 'users.name', 'users.avatar' )->get()->count() > 0)
                        @foreach(DB::table('ratings')->join('users', 'users.id', '=', 'ratings.user_id')->where('ratings.product_id', $product->id)->select('ratings.id', 'ratings.stars', 'ratings.comment', 'ratings.created_at', 'users.name', 'users.avatar', 'users.email')->get() as $rating)
                        <div class="row">
                            <div class="col-md-3">
                                @if (empty($rating->avatar))
                                <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                                @else
                                <img src="data:image/jpeg; base64, {{ $rating->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                                @endif
                                <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::parse($rating->created_at)->diffForHumans() }}</div>
                            </div>
                            <div class="col-md-9">
                                <div>
                                    <a href="{{ $rating->email }}" class="text-primary font-weight-bold">{{ $rating->name }}</a>
                                    <span style="float:right;">
                                        @if($rating->stars == "0.5")
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        <span class="fa fa-star text-white"></span>
                                        <span class="fa fa-star text-white"></span>
                                        <span class="fa fa-star text-white"></span>
                                        <span class="fa fa-star text-white"></span>
                                        @elseif($rating->stars == "1")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "1.5")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "2")
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "2.5")
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "3")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "3.5")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "4")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "4.5")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star-half" style="color: orange !important;"></span>
                                        @elseif($rating->stars == "5")
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        <span class="fa fa-star checked" style="color: orange !important;"></span>
                                        @endif

                                    </span>
                                </div>
                                <p>{{ $rating->comment }}</p>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        @else
                            <h3>No yet ratings for this product.</h3>
                        @endif

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        @if(count(App\product::where("category_id", $product->category_id)->where("id", "!=",$product->id)->get()) > 0)
        <div class="page-header">
        <h4>Related Products</h4>
        </div>
        <div class="row productsContent">
        @foreach(App\product::where("category_id", $product->category_id)->where("id", "!=",$product->id)->take(4)->get() as $related_product)
        <div class="col-md-3 col-12 ">
            <div class="productBox">
            <div class="productImage clearfix">
                <?php $count = 0;?>
                @foreach(App\image::where("product_id", $related_product->id)->get() as $img)
                <?php $count++; ?>
                    @if($count ==1)
                    <img src="data:image/jpeg; base64,{{ $img->image }}" alt="{{ $related_product->name }}" style="width:100%; height:25em;">
                    @endif
                @endforeach
                <div class="productMasking">
                <ul class="list-inline btn-group" role="group">
                    <li><a class="btn btn-default btn-wishlist" href="{{ URL::to('wishlist/'.$related_product->id) }}" ><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="{{ URL::to('add-cart/'.$related_product->id) }}" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                    <li><a href="{{ URL::to('product/'.$related_product->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5>{{ $related_product->name }}</h5>
                <h3>Rs. {{ number_format($related_product->price, 2) }}</h3>
            </div>
            </div>
        </div>
        @endforeach
        </div>
        @endif        
    </div>
</section>

     <!-- Modal -->
     <div class="modal fade quick-view-drone" id="exchange_p" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                    
                    <div class="media flex-wrap">
                        <div class="media-left px-0">
                            {{-- <img class="media-object" src="{{ asset('web_assets/img/home/featured-product/product-img14.jpg') }}" alt="" id="pImage"> --}}
                        </div>
                        <div class="media-body">
                            <form action="{{ URL::to('exchange/'.$product->id.'/product') }}" method="POST">
                            <h2>Select your product.</h2>
                            <p>Choose your product below to exchange with.</p>
                        
                            @csrf
                            <span class="quick-drop">
                                <select name="exchange_product" onchange="getP(this);" id="exchange_product" class="select-drop">
                                    @foreach (App\product::where('user_id', $user_details->id)->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </span>
                            <div class="btn-area">
                                <button type="submit" class="btn btn-primary btn-default">
                                    Exchange <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
<!-- Modal Default ends-->
<script>
function getP(obj) {
    
}
</script>

@endsection