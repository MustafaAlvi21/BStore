<!-- NAVBAR -->
<style>
.dropdown-toggle::after {
    display: none;
}
</style>
<nav class="navbar navbar-main navbar-default navbar-expand-md nav-V3" role="navigation">
  <div class="container">

@if(Request::path() == '/' || Request::path() == '/home')
    <div class="nav-category dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
      Category
        <button type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </a>

      <ul class="dropdown-menu dropdown-menu-left">
       
          {{-- Skill Categories --}}
          @foreach (App\category::where("active_status", "active")->where("category_type", "skill")->orderBy("created_at")->paginate(3); as $item)
            <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">
            <!-- <i class="lnr lnr-camera" aria-hidden="true"></i> -->
            <b>{{ $item->name }}</b>
            
            </a></li>
          @endforeach

          {{-- Product Categories --}}
          @foreach (App\category::where("active_status", "active")->where("category_type", "product")->orderBy("created_at")->paginate(3); as $item)
            <li><a href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">
            <!-- <i class="lnr lnr-camera" aria-hidden="true"></i> -->
            <b>{{ $item->name }}</b>
            </a></li>
          @endforeach
        
        <li><a href="{{ URL::to('products') }}"><img src="{{ asset('web_assets/img/home/category/category-img1.jpg') }}" alt="Image"></a></li>
        
      </ul>

    </div>
@else
<!-- style="background-color: #F5F5F5 !important;" -->
<div class="dropdown" style="line-height: 48px !important;padding: 0 15px !important;">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span style="color: #fff;font-size: 16px;font-weight: 700;text-transform: uppercase;padding-left: 1.5em;padding-right: 1.5em;">Categories </span>
      <i class="fa fa-bars"></i> 
    </button>
    <div class="dropdown-menu" style="background-color:white;" aria-labelledby="dropdownMenuButton">
      
    @if(Request::path() == 'skills')
      @foreach (App\category::where("active_status", "active")->where("category_type", "skill")->orderBy("created_at")->paginate(6); as $item)
      <a class="dropdown-item" style="border-bottom: 1px solid rgba(0,0,0,.1);font-size:.8em;font-weight: bold;" href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">{{ $item->name }}</a>
      @endforeach
    @elseif(Request::path() == 'products')

    @foreach (App\category::where("active_status", "active")->where("category_type", "product")->orderBy("created_at")->paginate(6); as $item)
    <a class="dropdown-item" style="border-bottom: 1px solid rgba(0,0,0,.1);font-size:.8em;font-weight: bold;" href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">{{ $item->name }}</a>
    @endforeach

    @else

      @foreach (App\category::where("active_status", "active")->where("category_type", "skill")->orderBy("created_at")->paginate(3); as $item)
      <a class="dropdown-item" style="border-bottom: 1px solid rgba(0,0,0,.1);font-size:.8em;font-weight: bold;" href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">{{ $item->name }}</a>
      @endforeach
      @foreach (App\category::where("active_status", "active")->where("category_type", "product")->orderBy("created_at")->paginate(3); as $item)
      <a class="dropdown-item" style="border-bottom: 1px solid rgba(0,0,0,.1);font-size:.8em;font-weight: bold;" href="{{ URL::to('category/'.$item->id.'/'.$item->category_type) }}">{{ $item->name }}</a>
      @endforeach
    @endif

    </div>
</div>
    
@endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-controls="navbar-ex1-collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == '/') active @endif">
          <a href="{{ URL::to('/') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == 'skills') active @endif">
          <a href="{{ URL::to('/skills') }}" class="nav-link" >Skills</b></a>
        </li>
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == 'products') active @endif">
          <a href="{{ URL::to('/products') }}" class="nav-link">Products</a>
        </li>
        <li class="dropdown nav-item @if(Route::getFacadeRoot()->current()->uri() == 'dashboard' || Route::getFacadeRoot()->current()->uri() == 'profile' || Route::getFacadeRoot()->current()->uri() == 'my_orders' || Route::getFacadeRoot()->current()->uri() == 'customer_orders') active @endif">
          <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ URL::to('profile') }}">Profile</a></li>
            <li><a href="{{ URL::to('/my_orders') }}">My Orders</a></li>
            <li><a href="{{ URL::to('/my_wishlist') }}">My Wishlist</a></li>
            <li><a href="{{ URL::to('/customer_orders') }}">Customer Orders</a></li>
          </ul>
        </li>
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == 'howitwork') active @endif">
          <a  href="{{ URL::to('/howitwork') }}" class="nav-link">How it works</b></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div>
</nav>