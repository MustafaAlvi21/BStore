@extends('admin.layouts.app')
@section("title", "Dashboard")
@section('content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Add Slides</h4>
                </div>
                <div class="card-body mt-4">

                    @if (Session::has('success_msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{ Session::get('success_msg') }}
                        </div>
                    @elseif(Session::has('error_msg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{ Session::get('error_msg') }}
                        </div>
                    @endif

                    <form action="{{ URL::to('sliderData') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" checked name="type" id="type" value="product"> Product Slides
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type" id="type" value="skill"> Skill Slides
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="images">Choose Images</label>
                      <input type="file" class="form-control pb-5 pt-4" name="images[]" id="images" placeholder="" multiple>
                      <h5 class="form-text text-muted"><i>Images size should be 420x453</i></h5>
                        @error('images')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-success" type="submit">Add Slides</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <hr>

    <table class="table mt-5 mb-5 pt-5 pb-5">
        <thead>
            <tr>
                <th>Image</th>
                <th>Type</th>
                <th>Added By</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slides as $item)
            <tr>
                <td scope="row">
                    <img src="data:image/jpeg; base64, {{ $item->slide }}" width="200" height="150" alt="{{ $item->type }}" class="img img-thumbnail">
                </td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->admin }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('D d M, Y h:s a') }}</td>
                <td>
                    <form action="{{ URL::to('slider/'.$item->id.'/delete') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <br><br><br><br>
</div>
    
@endsection