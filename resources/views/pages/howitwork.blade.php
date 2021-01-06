@extends('layouts.app')
@section("title", "How it works")
@section('content')
<style>
video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Adjust as needed */
}
</style>
<div class="jumbotron">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 element-content">
                <div class="fluid-width-video-wrapper text-center mt-4 mb-5">
                    <video src="{{ asset('web_assets/video/catchmango_intro.mp4') }}" style="width:100%;" controls controlsList="nodownload" frameborder="0" allowfullscreen></video>
                </div>
        </div>
    </div>

</div>
@endsection