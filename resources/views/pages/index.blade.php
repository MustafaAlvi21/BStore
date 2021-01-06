@extends('layouts.app')
@section("title", "Home")
@section('content')
<style>
.featuredProductsSlider  div  div {
    width: 100%;
}
</style>
      <!-- BANNER -->
      <div class="container">
        <div class="row justify-content-md-end">
          <div class="col-sm-12 ml-auto bannercontainer ">
            <div class="fullscreenbanner-container bannerV4">
              <div class="fullscreenbanner">
                <ul>
                  <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('web_assets/img/home/banner-slider/slider-img2.jpg') }}" alt="slidebg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                    <div class="slider-caption slider-captionV4 text-center">
                      <div class="tp-caption rs-caption-2 sft text-center"
                        data-x="center"
                        data-y="200"
                        data-speed="800"
                        data-start="2000"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">
                        <small>Learn</small>
                        <br>
                        New Skills
                      </div>
  
                      <div class="tp-caption rs-caption-3 sft text-center"
                        data-x="center"
                        data-y="325"
                        data-speed="1000"
                        data-start="3000"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        It's completely free
                      </div>
  
                      <div class="tp-caption rs-caption-4 sft text-center"
                        data-x="center"
                        data-y="385"
                        data-speed="800"
                        data-start="3500"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        <span class="page-scroll"><a href="{{ URL::to('skills') }}" class="btn primary-btn">See Skills<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                      </div>
                    </div>
                  </li>
                  <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
                    <img src="{{ asset('web_assets/img/home/banner-slider/slider-img1.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                    <div class="slider-caption slider-captionV4">
                      <div class="tp-caption rs-caption-2 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="115"
                        data-speed="800"
                        data-start="2000"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">
                        <small>Find</small>
                        <br>
                        New Friends
                      </div>
  
                      <div class="tp-caption rs-caption-3 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="240"
                        data-speed="1000"
                        data-start="3000"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        It's completely free
                      </div>
                      <div class="tp-caption rs-caption-4 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="300"
                        data-speed="800"
                        data-start="3500"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        <span class="page-scroll"><a href="{{ URL::to('users') }}" class="btn primary-btn">See Friends<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                      </div>
                    </div>
                  </li>
                  <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('web_assets/img/home/banner-slider/slider-img3.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                    <div class="slider-caption slider-captionV4">
                      <div class="tp-caption rs-caption-2 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="115"
                        data-speed="800"
                        data-start="2000"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">
                        <small>New</small>
                        <br>
                        Mega Offers 
                      </div>
  
                      <div class="tp-caption rs-caption-3 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="240"
                        data-speed="1000"
                        data-start="3000"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        It's completely free
                      </div>
                      <div class="tp-caption rs-caption-4 sft"
                        data-hoffset="0"
                        data-x="85"
                        data-y="300"
                        data-speed="800"
                        data-start="3500"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off">
                        <span class="page-scroll"><a href="{{ URL::to('products') }}" class="btn primary-btn">See Offers<i class="glyphicon glyphicon-chevron-right"></i></a></span>
                      </div>
                    </div>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CONTENT SECTION -->
      <section class="content clearfix">
        <div class="container">

          <!-- FEATURE COLLECTION SECTION -->
          <div class="row featuredCollection version2 version3">
            <div class="col-md-6 col-12">
              <div class="slide">
                <div class="productImage productImage1" style="background-image: url(web_assets/img/home/featured-collection/banner1.jpg);">
                </div>
                <!-- <div class="productCaption clearfix text-right">
                  <h3><a href="#">women’s Shoes</a></h3>
                  <p>New design women shoe</p>
                  <a href="#" class="btn btn-border">Buy Now</a>
                </div> -->
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="slide">
                <div class="productImage productImage2" style="background-image: url(web_assets/img/home/featured-collection/banner2.jpg);">
                </div>
                <!-- <div class="productCaption clearfix text-right">
                  <h3><a href="#">Headphone wifi</a></h3>
                  <p>Lorem ipsum dolor sit ameit</p>
                  <a href="#" class="btn btn-border">Shop Now</a>
                </div> -->
              </div>
            </div>
          </div>

          <!-- CATEGORY SECTION -->
          <div class="categorySection">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="category-content">
                  <div class="category-top d-flex justify-content-between">
                    <div class="category-menu text-center">
                      <h2 class="category-title">Skills</h2>
                      <ul>
                      @foreach(App\category::where("category_type", "skill")->where("active_status", "active")->orderBy("created_at", "asc")->take(9)->get() as $item)
                        <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}" class="font-weight-bold">{{ $item->name }}</a></li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="category-Slider">
                      <div class="categorySlider">
                      @foreach(DB::table('items_sliders')->where('type', 'skill')->orderBy('created_at', 'asc')->get() as $item)
                        <div class="item">
                          <img src="data:image/jpeg; base64, {{$item->slide}}" style="width: 364px;height:420px; " alt="{{ $item->type }}">
                        </div>
                      @endforeach
                      </div>
                    </div>
                  </div>



                  <div class="category-bottom d-md-flex justify-content-md-between">
                  @foreach(App\skill::orderBy("created_at", "asc")->take(3)->get() as $item)
                    <div class="imageBox">
                      <div class="productImage clearfix"> 
                          <a href="{{ URL::to('product/'.$item->id) }}">
                            <img src="data:image/jpeg; base64, {{ $item->image }}" style="height:191px;" alt="Image">
                          </a>
                        <div class="productMasking">
                          <ul class="list-inline btn-group" role="group">
                            
                            <li><a href="{{ URL::to('skill/'.$item->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="productCaption clearfix">
                        <!-- <h5><a href="{{ URL::to('product/'.$item->id) }}">{{ $item->name }}</a> -->
                        </h5>
                        
                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>
              </div>

              <div class="col-md-6 col-12">
                <div class="category-content">
                  <div class="category-top d-flex justify-content-between">
                    <div class="category-menu text-center">
                      <h2 class="category-title">Skills</h2>
                      <ul>
                      @foreach(App\category::where("category_type", "skill")->where("active_status", "active")->orderBy("created_at", "desc")->take(9)->get() as $item)
                        <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}" class="font-weight-bold">{{ $item->name }}</a></li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="category-Slider">
                      <div class="categorySlider">
                      @foreach(DB::table('items_sliders')->where('type', 'skill')->orderBy('created_at', 'desc')->get() as $item)
                        <div class="item">
                          <img src="data:image/jpeg; base64, {{$item->slide}}" style="width: 364px;height:420px; " alt="{{ $item->type }}">
                        </div>
                      @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="category-bottom d-md-flex justify-content-md-between">
                  @foreach(App\skill::orderBy("created_at", "desc")->take(3)->get() as $item)
                      <div class="imageBox">
                        <div class="productImage clearfix"> 
                            <a href="{{ URL::to('product/'.$item->id) }}">
                              <img src="data:image/jpeg; base64, {{ $item->image }}" style="height:191px;" alt="Image">
                            </a>
                          <div class="productMasking">
                            <ul class="list-inline btn-group" role="group">
                              <li><a href="{{ URL::to('skill/'.$item->id) }}" class="btn btn-default" title="View"><i class="fa fa-eye"></i></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="productCaption clearfix">
                          <!-- <h5><a href="{{ URL::to('product/'.$item->id) }}">{{ $item->name }}</a> -->
                          </h5>
                          
                        </div>
                      </div>
                      @endforeach

                  </div>
                </div>
              </div>

              <div class="col-md-6 col-12">
                <div class="category-content">
                  <div class="category-top d-flex justify-content-between">
                    <div class="category-menu text-center">
                      <h2 class="category-title">Products</h2>
                      <ul>
                      @foreach(App\category::where("category_type", "product")->where("active_status", "active")->orderBy("created_at", "asc")->take(9)->get() as $item)
                        <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}" class="font-weight-bold">{{ $item->name }}</a></li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="category-Slider">
                      <div class="categorySlider">
                      @foreach(DB::table('items_sliders')->where('type', 'product')->orderBy('created_at', 'asc')->get() as $item)
                        <div class="item">
                          <img src="data:image/jpeg; base64, {{$item->slide}}" style="width: 364px;height:420px; " alt="{{ $item->type }}">
                        </div>
                      @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="category-bottom d-md-flex justify-content-md-between">
                  @foreach(App\product::orderBy("created_at", "desc")->take(3)->get() as $item)
                    <div class="imageBox">
                      <div class="productImage clearfix">
                      <?php $count = 0; ?>     
                      @foreach(App\image::where("product_id", $item->id)->get() as $img)
                        <?php $count++; ?>
                          @if($count ==1)
                          <a href="#">
                            <img src="data:image/jpeg; base64,{{ $img->image }}" style="height:191px;" alt="Image">
                          </a>
                          @endif
                      @endforeach
                        <!-- <span class="sticker">50% off</span> -->
                        <div class="productMasking">
                          <ul class="list-inline btn-group" role="group">
                            <li><a href="{{ URL::to('wishlist/'.$item->id) }}" title="Add Wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></a></li>
                            <li><a href="{{ URL::to('add-cart/'.$item->id) }}" title="Add Cart" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                            <li><a href="{{ URL::to('product/'.$item->id) }}" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="productCaption clearfix">
                        <!-- <h5><a href="#">{{ $item->name }}</a></h5> -->
                        <h3>Rs. {{ number_format($item->price, 2) }}</h3>
                      </div>
                    </div>
                  @endforeach
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-12">
                <div class="category-content">
                <div class="category-top d-flex justify-content-between">
                    <div class="category-menu text-center">
                      <h2 class="category-title">Products</h2>
                      <ul>
                      @foreach(App\category::where("category_type", "product")->where("active_status","active")->orderBy("created_at", "desc")->take(9)->get() as $item)
                        <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}"  class="font-weight-bold">{{ $item->name }}</a></li>
                      @endforeach
                      </ul>
                    </div>
                    <div class="category-Slider">
                      <div class="categorySlider">
                      @foreach(DB::table('items_sliders')->where('type', 'product')->orderBy('created_at', 'desc')->get() as $item)
                        <div class="item">
                          <img src="data:image/jpeg; base64, {{$item->slide}}" style="width: 364px;height:420px; " alt="{{ $item->type }}">
                        </div>
                      @endforeach 
                      </div>
                    </div>
                  </div>


                  <div class="category-bottom d-md-flex justify-content-md-between">
                  @foreach(App\product::orderBy("created_at", "asc")->take(3)->get() as $item)
                    <div class="imageBox">
                      <div class="productImage clearfix">
                      <?php $count = 0; ?>     
                      @foreach(App\image::where("product_id", $item->id)->get() as $img)
                        <?php $count++; ?>
                          @if($count ==1)
                          <a href="#">
                            <img src="data:image/jpej; base64,{{ $img->image }}" style="height:191px;" alt="Image">
                          </a>
                          @endif
                      @endforeach
                        <!-- <span class="sticker">50% off</span> -->
                        <div class="productMasking">
                          <ul class="list-inline btn-group" role="group">
                            <li><a href="{{ URL::to('wishlist/'.$item->id) }}" title="Add Wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></a></li>
                            <li>
                              <a href="{{ URL::to('add-cart/'.$item->id) }}" title="Add Cart" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a>
                            </li>
                            <li><a href="{{ URL::to('product/'.$item->id) }}" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="productCaption clearfix">
                        <!-- <h5><a href="#">{{ $item->name }}</a></h5> -->
                        <h3>Rs. {{ number_format($item->price, 2) }}</h3>
                      </div>
                    </div>
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="page-header">
              <h4 style="color: #ffb548 !important;"><strong>Top Users</strong></h4>
          </div>
            
          <div class="row featuredProducts featuredProductsSlider margin-bottom">
              
              @foreach(App\User::where("email_verified_at", "!=", null)->where("account_status", "active")->get() as $user)

              <div class="slide col-md-3">
                  <div class="productImage clearfix">
                      <a href="#" >
                        @if(!empty($user->avatar))
                        <img src="data:image/jpeg; base64, {{ $user->avatar }}" style="width:201px !important; height: 205px !important;" alt="{{ $user->name }}">
                        @else 
                        <img src="{{ asset('web_assets/img/user.png') }}" style="width:201px !important; height: 205px !important;" alt="{{ $user->name }}">
                        @endif
                      </a>
                  </div>
                  <div class="productCaption clearfix">
                    <a href="#" >
                        <h4 class="pt-3">{{ $user->name }}</h4>
                    </a>
                    <p>{{ $user->profile_info }}</p>
                  </div>
              </div>
              
              @endforeach

          </div>



        </div>
      </section>

@endsection
