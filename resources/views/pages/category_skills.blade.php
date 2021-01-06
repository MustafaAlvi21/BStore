@extends('layouts.app')
@section("title", "Category Skills")
@section('content')

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix">
        <div class="container">
        @if(count($skills) > 0)
          <div class="page-header">
            <h4>Category Skills</h4>
          </div>

          <div class="row featuredCollection margin-bottom">
          @foreach($skills as $item)
          <div class="col-md-4 col-12">
                <div class="p-3" style="background-color: #ffb548;">
                    <h3 class="text-white">
                      <?php echo substr($item->name, 0, 17) . (strlen($item->name) > 17 ? "..." : ''); ?>  
                    </h3>
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
          @else

          <div class="page-header text-center">
              <h4 style="text-transform: none;">Be the first to add skill with <b>"{{ $category_name }}" </b> category. <a href="{{ URL::to('add_skill/create') }}" class="btn btn-primary btn-sm">Add Now!</a></h4>
          </div>
          @endif    

        </div>
    </section>
@endsection