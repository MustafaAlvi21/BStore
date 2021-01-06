@extends('layouts.app')
@section("title", "Users")
@section('content')

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix">
        <div class="container jumbotron">
          
            @if(count(App\User::where("email_verified_at", "!=", null)->where("account_status", "active")->paginate(12)) > 0)
            <div class="page-header">
                <h4>Users</h4>
            </div>
            <div class="row featuredCollection margin-bottom">
            @foreach(App\User::where("email_verified_at", "!=", null)->where("account_status", "active")->paginate(12) as $user)
            <div class="col-md-12 col-12 mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ URL::to('user/'.$user->id) }}" class="text-primary">
                            <img src="data:image/jpeg; base64, {{ $user->avatar }}" style="height:14em;width:100% !important;" class="text-center img img-thumbnail" alt="{{ $user->name }}">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="mt-2 mb-4">
                            <h4 class="pl-1">
                                <a href="{{ URL::to('user/'.$user->id) }}" class="text-primary font-weight-bold">{{ $user->name }}</a>
                            </h4>
                            <span class="pull-right">Join Since <strong>{{ $user->created_at->format("d M, Y") }}</strong></span>
                        </div>
                        <hr>
                        <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus.</p>                        
                    </div>
                </div>
            <hr>
            </div>
            @endforeach

          </div>
          {{App\User::where("email_verified_at", "!=", null)->where("account_status", "active")->paginate(12)->links()}}
            @else

            <div class="page-header text-center">
                <h4 style="text-transform: none;">Sorry, there are not users yet.</h4>
            </div>
            @endif    

        </div>
    </section>
@endsection