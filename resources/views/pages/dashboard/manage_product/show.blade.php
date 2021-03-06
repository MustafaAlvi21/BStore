@extends('layouts.dashboard.app')
@section("title", "All Products")
@section("dashboard_title", "ACCOUNT DASHBOARD")

@section('content')


<section class="mainContent clearfix userProfile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="innerWrapper">
                    <div class="orderBox">
                        <h4>All Your Product</h4>
                        <div class="table-responsive">
                            @if(Session::has("success_msg"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Deleted Success!</strong> {{ Session::get("success_msg") }}
                            </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_user_products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td> 
                                    
                                    <?php $count = 0; ?>
                                    @foreach($images as $img)
                                        @if($img->product_id == $item->id)
                                        <?php $count++; ?>
                                            @if($count == 1)
                                                <img src="data:image/jpeg; base64,{{ $img->image }}" width="200" style="height:15em;" alt="" class="img img-thumbnail"> 
                                            @endif
                                        @endif
                                    
                                    @endforeach
                                    
                                    </td>
                                    <td>{{ $item->cat_name }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format("D d, M Y") }}</td>
                                    <td>
                                    <form action="{{ URL::to('add_product/'.$item->id) }}" method="post" >
                                    @csrf
                                    @method("DELETE")
                                        <button type="submit" class="btn btn-link" style="color:red;"> <i class="fa fa-trash"></i></button> |
                                    </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection