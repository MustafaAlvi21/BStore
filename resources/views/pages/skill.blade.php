@extends('layouts.app')
@section("title", "Skill Details")
@section('content')

<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="page-title">
            <h2>Skill</h2>
            </div>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb pull-right">
            <li>
                <a href="{{ URL::to('/') }}">Home</a>
            </li>
            <li class="active">Skill</li>
            </ol>
        </div>
        </div>
    </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="mainContent clearfix">
    <div class="container">
        <div class="row singleProduct">
        <div class="col-md-12">
            <div class="media flex-wrap">
            <div class="media-left productSlider">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-thumb="0">
                        <img src="data:image/jpeg; base64, {{ $skill->image }}" style="width: 400px;height: 476px;">
                      </div>
                    </div>
                  </div>
                <div class="clearfix">
                <div id="thumbcarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <div data-target="#carousel" data-slide-to="0" class="thumb"><img style="width:106px !important; height:106px !important;" src="data:image/jpeg; base64, {{ $skill->image }}"></div>
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
                <ul class="list-inline">
                <!--<li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Share This</a></li>-->
                </ul>
                <h2>{{ $skill->name }} <span class="text-muted " style="font-size: .4em !important;"><em>{{ App\category::where("id", $skill->category_id)->first()->name }}</em></span></h2>
                <p>{{ $skill->description }}</p>
                <div class="tabArea">
                <ul class="nav nav-tabs bar-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#user_info">User Info</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact_details">Contact Details</a></li>
                </ul>
                <div class="tab-content">
                    <div id="user_info" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-3">
                            @if (empty($user_details->avatar))
                            <img src="{{ asset('web_assets/img/user.png') }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                            @else
                            <img src="data:image/jpeg; base64, {{ $user_details->avatar }}" style="height:10em;" class="img img-thumbnail" alt="{{ $user_details->name }}">
                            @endif
                        </div>
                        <div class="col-md-9">
                        <h5 class="pt-2">{{ $user_details->name}}</h5>
                        
                        <p>
                        {{ $user_details->profile_info }}
                        </p>
                        <hr>
                        <ul class="unstyled">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user_details->state }}, {{ $user_details->country }}</li>
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
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{ $user_details->email }}" style="color:gray;">{{ $user_details->email }}</a></li>
                                    <hr>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> {{ $user_details->phone }}</li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        @if(!empty($skill->video_link))
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <iframe style="width: 100%; height: 40em;" src="{{ 'https://www.youtube.com/embed/'.$skill->video_link }}">
                </iframe>        
            </div>
            <div class="col-md-2"></div>
        </div>
        @endif
        
        
        @if(count(App\skill::where("category_id", $skill->category_id)->where("id", "!=",$skill->id)->get()) > 0)
        <div class="page-header">
        <h4>Related Skills</h4>
        </div>
        <div class="row productsContent">
        @foreach(App\skill::where("category_id", $skill->category_id)->where("id", "!=",$skill->id)->take(4)->get() as $related_skill)
        <div class="col-md-3 col-12 ">
            <div class="productBox">
            <div class="productImage clearfix">
                <img src="data:image/jpeg; base64,{{ $related_skill->image }}" alt="{{ $related_skill->name }}">
                <div class="productMasking">
                <ul class="list-inline btn-group" role="group">
                    <li><a href="{{ URL::to('skill/'.$related_skill->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <h5>{{ $related_skill->name }}</h5>
            </div>
            </div>
        </div>
        @endforeach
        </div>
        @endif

        
    </div>
</section>
				
@endsection