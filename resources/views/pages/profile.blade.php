@extends('layouts.app')
@section("title", "Profile")
@section('content')

<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn-upload-pic {
  border: 2px solid #ffb548;
  color: #ffb548;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 15px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>

      <section class="mainContent clearfix userProfile">
      sa  <div class="container">
          <div class="row">
            <div class="col-md-12">
            @if(Session::has('success_msg'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <strong>Changed!</strong> {{ Session::get('success_msg') }}
              </div>
            @endif
              <div class="innerWrapper profile">
                <div class="orderBox">
                  <h2>profile</h2>
                </div>
                <div class="row">
                  <div class="col-md-4 col-lg-3 col-xl-2 col-12">

                    <form action="{{ URL::to('profile_upload') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="thumbnail">
                        @if(empty(Auth::user()->avatar))
                        <img id="pro-pic" style="width: 170px;height: 170px;" src="{{ asset('web_assets/img/user.png') }}" alt="profile-image">
                        @else
                        <img id="pro-pic" style="width: 170px;height: 170px;" src="data:image/jpeg; base64, {{ Auth::user()->avatar }}" alt="profile-image">
                        @endif

                        <div class="upload-btn-wrapper mt-3">
                          <!-- <button class="btn-upload-pic">Choose Image</button>
                          <input type="file" onchange="readURL(this);" name="img" require/> -->
                          <div class="custom-file" style="border: 2px solid #ffb548;color: #ffb548;background-color: white;padding: 8px 20px;border-radius: 8px;font-size: 15px;font-weight: bold;">
                      <!-- MY Custom image chooser -->
                          <input type="file" class="custom-file-input" onchange="readURL(this);" name="img" required>
                          <label class="custom-file-label" for="img">Choose Image</label>
                        </div>
                        </div>

                      
                        <div class="caption">
                          <button type="submit" class="btn btn-primary btn-block" role="button">Change Avatar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-8 col-lg-9 col-xl-10 col-12">

                    <form class="form-horizontal" action="{{ URL::to('updateProfile') }}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                            @if(Auth::user()->phone == null && Auth::user()->state == null)
                              <span class="text-danger font-weight-bold">Please complete your profile first.</span>
                            @endif

                            @if(Session::has('msg'))
                              <span class="text-success font-weight-bold">{{ Session::get('msg') }}</span>
                            @endif
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="form-group row">
                          <label for="" class="col-md-3 control-label">Name</label>
                          <div class="col-md-7">
                            <input type="text" class="form-control" id="" disabled value="{{ Auth::user()->name }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-3 control-label">Age</label>
                          <div class="col-md-7">
                            <input type="email" class="form-control" id="" disabled value="{{ Carbon\Carbon::now('Y')->subYear(Auth::user()->birth_year)->format('y')}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-md-3 control-label">Email Address</label>
                          <div class="col-md-7">
                            <input type="email" class="form-control" id="" disabled value="{{ Auth::user()->email }}">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-3 control-label">{{ __('Phone') }} <span class="text-danger">*</span> </label>

                            <div class="col-md-7">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone" maxlength="13" placeholder="+923XXXXXXXXX">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wa_phone" class="col-md-3 control-label">{{ __('Whatsapp Number') }} </label>

                            <div class="col-md-7">
                                <input id="wa_phone" type="text" class="form-control @error('wa_phone') is-invalid @enderror" name="wa_phone" value="{{ Auth::user()->wa_phone }}" autocomplete="phone" maxlength="13" placeholder="+923XXXXXXXXX (Optional)">

                                @error('wa_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-3 control-label">{{ __('State') }} <span class="text-danger">*</span></label>

                            <div class="col-md-7">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ Auth::user()->state }}" required autocomplete="state" placeholder="Your state">

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skype_id" class="col-md-3 control-label">{{ __('Skype ID') }}</label>

                            <div class="col-md-7">
                                <input id="skype_id" type="text" class="form-control @error('skype_id') is-invalid @enderror" name="skype_id" value="{{ Auth::user()->skype_id }}" autocomplete="skype_id" placeholder="Optional">

                                @error('skype_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_info" class="col-md-3 control-label">{{ __('Profile Info') }}</label>
                            <div class="col-md-7">
                              <textarea id="profile_info" style="height: auto;" class="form-control @error('profile_info') is-invalid @enderror" rows="2" name="profile_info" autocomplete="profile_info" placeholder="Optional">{{ Auth::user()->profile_info }}</textarea>
                                @error('profile_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                          <div class=" col-md-12 ">
                            <button type="submit" class="btn btn-primary float-right">SAVE INFO</button>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection