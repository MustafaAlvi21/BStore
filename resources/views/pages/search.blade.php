@extends('layouts.app')
@section("title", "Search")
@section('content')

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix">
        <div class="container">
          
            @if(!empty($users) && count($users))
            <div class="page-header">
                <h4 style="text-transform: none;">Search result for <b>"{{ $result }}"</b></h4>
            </div>
            <div class="row featuredCollection margin-bottom">
            @foreach($users as $user)
            <div class="col-md-12 col-12">
                <div class="row jumbotron m-3">
                    <div class="col-md-3">
                        <a href="#" class="text-primary">
                            @if(!empty($user->avatar))
                            <img src="data:image/jpeg; base64, {{ $user->avatar }}" style="height:14em;width:100% !important;" class="text-center img img-thumbnail" alt="{{ $user->name }}">
                            @else
                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:14em;width:100% !important;" class="text-center img img-thumbnail" alt="{{ $user->name }}">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="mt-2 mb-4">
                            <h4 class="pl-1">
                                <a href="#" class="text-primary font-weight-bold">{{ $user->name }}</a>
                            </h4>
                            <span class="pull-right">Join Since <strong>{{ $user->created_at->format("d M, Y") }}</strong></span>
                        </div>
                        <hr>
                        <p>{{ $user->profile_info }}</p>                        
                    </div>
                </div>
           
            </div>
            @endforeach

          </div>
          {{$users->links()}}

            @elseif(!empty($skills) && count($skills))
            <div class="page-header">
                <h4 style="text-transform: none;">Search result for <b>"{{ $result }}"</b></h4>
            </div>
            <div class="row featuredCollection margin-bottom">
                @foreach($skills as $item)
                <div class="col-md-4 col-12">
                    <div class="p-3" style="background-color: #ffb548;">
                        <h3 class="text-white">{{ $item->name }}</h3>
                    </div>
                    <div class="thumbnail" >
                        <div class="imageWrapper" style="border-bottom-left-radius: 5px !important;border-bottom-right-radius: 5px !important;">
                        <img src="data:image/jpeg; base64, {{ $item->image }}" style="width: 376px !important; height: 386px !important;" alt="featuet-collection-image">
                        
                        <div class="masking">
                            <a href="{{ URL::to('skill/'.$item->id) }}" class="btn viewBtn">View Skill</a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach

                </div>
            {{$skills->links()}}

            @elseif(!empty($products) && count($products))
            <div class="page-header">
                <h4 style="text-transform: none;">Search result for <b>"{{ $result }}"</b></h4>
            </div>
            <div class="row featuredCollection margin-bottom">
                @foreach($products as $item)
                <div class="col-md-4 col-12">
                    <div class="p-3" style="background-color: #ffb548; " >
                        <h4 class="text-white" style="font-size: 1.5em;">{{ $item->name }}</h4>
                    <h4 class="text-white text-right">Rs. {{ number_format($item->price, 2) }}</h4>
                    </div>
                    <div class="thumbnail" >
                        <div class="imageWrapper" style="border-bottom-left-radius: 5px !important;border-bottom-right-radius: 5px !important;">
                        <?php $count = 0; ?>     
                        @foreach(App\image::where("product_id", $item->id)->get() as $img)
                            <?php $count++; ?>
                            @if($count ==1)
                            <img src="data:image/jpeg; base64, {{ $img->image }}" style="width: 376px !important; height: 346px !important;" alt="featuet-collection-image">
                            @endif
                        @endforeach
                        <div class="masking">
                            <a href="{{ URL::to('product/'.$item->id) }}" class="btn viewBtn">View Product</a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$products->links()}}
            @else

            <div class="page-header text-center">
                <h4 style="text-transform: none;">Sorry, we couldn't find results matching "<b>{{ $result }}</b>"</h4>
            </div>
            @endif    

        </div>
    </section>
@endsection