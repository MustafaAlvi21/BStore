@extends('layouts.app')
@section("title", "Products")
@section('content')

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix">
        <div class="container">
        @if(count(App\product::all()) > 0)
          <div class="page-header">
            <h4>Products</h4>
          </div>

          <div class="row featuredCollection margin-bottom">
          @foreach(App\product::paginate(12) as $item)
          <div class="col-md-4 col-12">
                <div class="p-3" style="background-color: #ffb548; " >
                    <h4 class="text-white" style="font-size: 1.5em;">
                      <?php echo substr($item->name, 0, 17) . (strlen($item->name) > 17 ? "..." : ''); ?>
                    </h4>
                   <h4 class="text-white text-right">Rs. {{ number_format($item->price, 2) }}</h4>
                </div>
                <div class="thumbnail" >
                    <div class="imageWrapper" style="border-bottom-left-radius: 5px !important;border-bottom-right-radius: 5px !important;">
                    <?php $count = 0; ?>     
                      @foreach(App\image::where("product_id", $item->id)->get() as $img)
                        <?php $count++; ?>
                          @if($count ==1)
                          <img src="data:image/jpeg; base64, {{ $img->image }}" style="width: 100% !important; height: 306px !important;" alt="featuet-collection-image">
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
          {{App\product::paginate(12)->links()}}
          @elseif(empty($category_name))
          <div class="page-header text-center">
            <h4 style="text-transform: none;">Be the first to add product. <a href="{{ URL::to('add_product/create') }}" class="btn btn-primary btn-sm">Add Now!</a></h4>
         </div>
          @else
        <div class="page-header text-center">
          <h4 style="text-transform: none;">Be the first to add product with <b>"{{ $category_name }}" </b> category. <a href="{{ URL::to('add_product/create') }}" class="btn btn-primary btn-sm">Add Now!</a></h4>
        </div>
        @endif    
        </div>
    </section>
@endsection