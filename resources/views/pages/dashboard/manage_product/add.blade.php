@extends('layouts.dashboard.app')
@section("title", "Add Product")
@section("dashboard_title", "ACCOUNT DASHBOARD")

@section('content')
<section class="mainContent clearfix userProfile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="innerWrapper"> -->
                    @if(Session::has("success_msg"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Added Success!</strong> {{ Session::get("success_msg") }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header pl-5 ml-3">{{ __('Add New Product') }}</div>

                        <div class="card-body">
                            
                            

                            <form method="POST" action="{{ URL::to('add_product') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row">
                                    <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Choose Category') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                            @foreach(App\category::where("active_status", "active")->where("category_type", "product")->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Choose Images') }}</label>

                                    <div class="col-md-6">
                                        <span class="text-dark"><i>Images size should be 405x476</i></span>
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="images[]" multiple required autocomplete="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary" style="background-color: #ffb548 !important;border-color:#ffb548 !important;">
                                            {{ __('Add Product') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>


@endsection