@extends('layouts.app')
@section("title", "Exchange Request Details")
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
            <h2>Exchange Request</h2>
            </div>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb pull-right">
            <li>
                <a href="{{ URL::to('/') }}">Home</a>
            </li>
            <li class="active">Exchange Request</li>
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


        <div class="row container">
            <div class="col-md-6">
            <div><h4 style="color: #ffb548 !important;"><i>Exchange Product </i></h4></div>
                <div class="row singleProduct">
                    <div class="col-md-12">
                    <hr>
                        <div class="media flex-wrap">
                        <div class="media-left productSlider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <?php $count_1 = 0;  ?>
                                @foreach(App\image::where("product_id", $exchange_to->p_id)->where("active_status", "active")->get() as $img)
                                    @if($count_1 == 0)

                                <div class="carousel-item active" data-thumb="<?php echo $count_1?>">
                                    <img src="data:image/jpeg; base64, {{ $img->image }}" style="width:15em !important; height:20em !important;">
                                </div>
                                    @else
                                    <div class="carousel-item" data-thumb="<?php echo $count_1?>">
                                        <img src="data:image/jpeg; base64, {{ $img->image }}" style="width:15em !important; height:20em !important;">
                                    </div>
                                        
                                    @endif
                                <?php $count_1++; ?>
                                @endforeach
                                </div>
                            </div>
                            <div class="clearfix">
                            <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                <?php $count_1 = 0;  ?>
                                @foreach(App\image::where("product_id", $exchange_to->p_id)->where("active_status", "active")->get() as $img)
                                    <div data-target="#carousel" data-slide-to="<?php echo $count_1?>" class="thumb"><img style="width: 6em !important; height:9em !important;" src="data:image/jpeg; base64, {{ $img->image }}"></div>
                                <?php $count_1++; ?>
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
                            <h2 style="font-size: 2em !important;" class="pt-2">{{ $exchange_to->p_name }} <span class="text-muted " style="font-size: .4em !important;"><em></em></span></h2>
                            <h3 style="font-size: 1.5em !important;">Rs. {{ number_format($exchange_to->p_price, 2) }}</h3>
                            <div class="btn-area"></div>
                            <hr>
                            <div class="tabArea">
                            <ul class="nav nav-tabs bar-tabs pb-2">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#user_info">User Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact_details">Contact Details</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rating">Rating</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="user_info" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if (empty($exchange->avatar))
                                        <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                        @else
                                        <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                    <h5 class="pt-2">{{ $exchange->v_name}}</h5>
                                    
                                    <p>
                                    {{ $exchange->profile_info }}
                                    </p>
                                    <hr>
                                    <ul class="unstyled">
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $exchange->state }}, {{ $exchange->country }}</li>
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
                                                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{ $exchange->email }}" style="color:gray;">{{ $exchange->email }}</a></li>
                                                <hr>
                                                <li><i class="fa fa-phone" aria-hidden="true"></i> {{ $exchange->phone }}</li>
                                                <hr>
                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                                <div id="rating" class="tab-pane fade scroll-rating pr-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty($exchange->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @endif
                                            {{--  <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="text-center img img-thumbnail" alt="{{ $exchange->v_name }}">  --}}
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="{{ $exchange->exc_id }}" class="text-primary font-weight-bold">{{ $exchange->v_name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty($exchange->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @endif
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="{{ $exchange->exc_id }}" class="text-primary font-weight-bold">{{ $exchange->v_name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty($exchange->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_name }}">
                                            @endif
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="{{ $exchange->exc_id }}" class="text-primary font-weight-bold">{{ $exchange->v_name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                            <div class="btn-area">
                            <form action="{{ URL::to('accept_request/'.$exchange_to->exc_id) }}" method="post">
                                 @csrf
                                <button type="submit" class="btn btn-primary btn-default mt-2" title="Accept"><b>Accept</b> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                                <form action="{{ URL::to('ignore_request/'.$exchange_to->exc_id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-default mt-2" title="Igonre"><b>Ignore</b> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </form>
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="col-md-6">
            <div><h4 style="color: #ffb548 !important;"><i>Your Product </i></h4></div>
                <div class="row singleProduct">
                    <div class="col-md-12">
                    <hr>
                        <div class="media flex-wrap">
                        <div class="media-left productSlider">
                            <div id="carousel1" style="margin-bottom: 20px;" class="carousel slide" data-ride="carousel1">
                                <div class="carousel-inner">
                                <?php $count = 0;  ?>
                                @foreach(App\image::where("product_id", $exchange->p_id)->where("active_status", "active")->get() as $img)
                                    @if($count == 0)

                                <div class="carousel-item active" data-thumb="<?php echo $count?>">
                                    <img src="data:image/jpeg; base64, {{ $img->image }}" style="width:15em !important; height:20em !important;">
                                </div>
                                    @else
                                    <div class="carousel-item" data-thumb="<?php echo $count?>">
                                        <img src="data:image/jpeg; base64, {{ $img->image }}" style="width:15em !important; height:20em !important;">
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
                                @foreach(App\image::where("product_id", $exchange->p_id)->where("active_status", "active")->get() as $img)
                                    <div data-target="#carousel1" data-slide-to="<?php echo $count?>" class="thumb"><img style="width: 6em !important; height:9em !important;" src="data:image/jpeg; base64, {{ $img->image }}"></div>
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
                            <h2 style="font-size: 2em !important;" class="pt-2">{{ $exchange->p_name }} <span class="text-muted " style="font-size: .4em !important;"><em></em></span></h2>
                            <h3 style="font-size: 1.5em !important;">Rs. {{ number_format($exchange->p_price, 2) }}</h3>
                        <div class="btn-area"></div>
                            <hr>
                            <div class="tabArea">
                            <ul class="nav nav-tabs bar-tabs pb-2">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#user_info1">User Info</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact_details1">Contact Details</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rating1">Rating</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="user_info1" class="tab-pane fade show active">
                                <div class="row">
                                    <div class="col-md-3">
                                        @if (empty(Auth::user()->avatar))
                                        <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                        @else
                                        <img src="data:image/jpeg; base64, {{ Auth::user()->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                    <h5 class="pt-2">{{ Auth::user()->name}}</h5>
                                    
                                    <p>
                                    {{ Auth::user()->profile_info }}
                                    </p>
                                    <hr>
                                    <ul class="unstyled">
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ Auth::user()->state }}, {{ Auth::user()->country }}</li>
                                    </ul>
                                    </div>
                                </div>
                                
                                </div>
                                <div id="contact_details1" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <ul class="unstyled">
                                                <hr>
                                                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{ Auth::user()->email }}" style="color:gray;">{{ Auth::user()->email }}</a></li>
                                                <hr>
                                                <li><i class="fa fa-phone" aria-hidden="true"></i> {{ Auth::user()->phone }}</li>
                                                <hr>
                                            </ul>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                                <div id="rating1" class="tab-pane fade scroll-rating pr-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty(Auth::user()->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ Auth::user()->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                            @endif
                                            {{--  <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="text-center img img-thumbnail" alt="{{ $exchange->v_name }}">  --}}
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="#" class="text-primary font-weight-bold">{{ Auth::user()->name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty(Auth::user()->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ Auth::user()->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $exchange->v_Auth::user()->name }}">
                                            @endif
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="#" class="text-primary font-weight-bold">{{ Auth::user()->name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if (empty(Auth::user()->avatar))
                                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                            @else
                                            <img src="data:image/jpeg; base64, {{ $exchange->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ Auth::user()->name }}">
                                            @endif
                                            <div class="text-center font-weight-bold pt-3">{{ Carbon\Carbon::now()->subMinute(12)->diffForHumans() }}</div>
                                        </div>
                                        <div class="col-md-9">
                                            <div>
                                                <a href="#" class="text-primary font-weight-bold">{{ Auth::user()->name }}</a>

                                                <span style="float:right;">
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                    <span class="fa fa-star checked" style="color: orange !important;"></span>
                                                </span>
                                            </div>
                                            <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>


        @if(count(App\product::where("category_id", $exchange->category_id)->where("id", '!=', $exchange->p_id)->get()) > 0)
        <div class="page-header">
        <h4>Related Products</h4>
        </div>
        <div class="row productsContent">
        @foreach(App\product::where("category_id", $exchange->category_id)->where("id", '!=', $exchange->p_id)->take(4)->get() as $related_product)
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
                    <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
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


<script>
function getP(obj) {
    
}
</script>

@endsection