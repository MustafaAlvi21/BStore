<!-- NAVBAR -->
<nav class="navbar navbar-main navbar-default navbar-expand-md nav-V3" role="navigation">
  <div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == 'dashboard') active @endif">
          <a href="{{ URL::to('/dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="dropdown nav-item @if(Route::getFacadeRoot()->current()->uri() == 'add_skill/create' || Route::getFacadeRoot()->current()->uri() == 'add_skill') active @endif">
          <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skills</b></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ URL::to('add_skill/create') }}">Add</a></li>
            <li><a href="{{ URL::to('add_skill') }}">All Skills</a></li>
          </ul>
        </li>
        <li class="dropdown nav-item @if(Route::getFacadeRoot()->current()->uri() == 'add_product/create' || Route::getFacadeRoot()->current()->uri() == 'add_product') active @endif">
          <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ URL::to('add_product/create') }}">Add</a></li>
            <li><a href="{{ URL::to('add_product') }}">All Products</a></li>
          </ul>
        </li>
        <li class="dropdown nav-item @if(Route::getFacadeRoot()->current()->uri() == 'profile' || Route::getFacadeRoot()->current()->uri() == 'my_orders' || Route::getFacadeRoot()->current()->uri() == 'customer_orders' || Route::getFacadeRoot()->current()->uri() == 'my_wishlist') active @endif">
          <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ URL::to('profile') }}">Profile</a></li>
            <li><a href="{{ URL::to('/my_orders') }}">My Orders</a></li>
            <li><a href="{{ URL::to('/customer_orders') }}">Customer Orders</a></li>
            <li><a href="{{ URL::to('/my_wishlist') }}">My Wishlist</a></li>            
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link">Wishlist</b></a>
        </li> -->
        <li class="nav-item @if(Route::getFacadeRoot()->current()->uri() == 'howitwork') active @endif">
          <a href='{{ URL::to("howitwork") }}' class="nav-link">How it works</b></a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->


  </div>
</nav>