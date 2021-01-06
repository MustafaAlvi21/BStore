@extends('layouts.app')
@section("title", "Verify Email ")
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ml-5 pl-5">
                <div class="card-header pl-5">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body pl-5">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a style="color: #ffb548 !important;" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
