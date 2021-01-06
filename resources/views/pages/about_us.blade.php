@extends('layouts.app')
@section("title", "About Us")
@section('content')

<section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="page-title">
                <h2>About Us</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb float-right">
                <li>
                  <a href="{{ URL::to('/') }}">Home</a>
                </li>
                <li class="active">About Us</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN CONTENT SECTION -->
      <section class="mainContent clearfix aboutUsInfo">
        <div class="container">
          <div class="page-header">
            <h3>Suspendisse suscipit vestibulum dignissim</h3>
          </div>
          <div class="row">
            <div class="col-md-6 order-sm-12">
              <img src="{{ asset('web_assets/img/about-us/title-img.jpg') }}" alt="about-us-img">
            </div>
            <div class="col-md-6 order-sm-1">
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Mauris lobortis augue ex, ut faucibus nisi mollis ac. Sed volutpat scelerisque ex ut ullamcorper. Cras at velit quis sapien dapibus laoreet a id odio. Sed sit amet accumsan ante, eu congue metus. Aenean eros tortor, cursus quis feugiat sed, vestibulum vel purus. Etiam aliquam turpis quis blandit finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor placerat lectus, facilisis ornare leo tincidunt vel. Duis rutrum felis felis, eget malesuada massa tincidunt a.</p>
              <ul class="unorder-list lists">
                <li>Neque porro quisquam est,</li>
                <li>qui dolorem ipsum quia dolor sit amet, </li>
                <li>consectetur, adipisci velit, sed quia</li>
                <li>non numquam eius modi tempora incidunt </li>
                <li>ut labore et dolore magnam aliquam</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- DARK SECTION -->
      <section class="darkSection clearfix">
        <div class="container">
          <h3>Our Store Locations</h3>
          <div class="row">
            <div class="col-md-3">
              <div class="thumbnail">
                <div class="caption">
                  <h5>New York</h5>
                  <address>
                    Krakovská 1307/22, 110 00 N,Y <br>
                    Vězeňská 910/2, 110 00 N,Y-Staré  <br>
                    Město Na Hřebenkách 2, 150 00  <br>
                    N,Y
                  </address>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail">
                <div class="caption">
                  <h5>Paris</h5>
                  <address>
                    Bebelpl. 1, 10117 Paris <br>
                    Jablonskistraße 16, 10405 Paris <br>
                    Rigaer Str. 9, 10247 Paris
                  </address>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail">
                <div class="caption">
                  <h5>New York</h5>
                  <address>
                    Krakovská 1307/22, 110 00 N,Y <br>
                    Vězeňská 910/2, 110 00 N,Y-Staré  <br>
                    Město Na Hřebenkách 2, 150 00  <br>
                    N,Y
                  </address>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="thumbnail">
                <div class="caption">
                  <h5>Paris</h5>
                  <address>
                    Bebelpl. 1, 10117 Paris <br>
                    Jablonskistraße 16, 10405 Paris <br>
                    Rigaer Str. 9, 10247 Paris
                  </address>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <button type="button" class="btn btn-primary-outlined btn-default">Check more</button>
            </div>
          </div>
        </div>
      </section>
      
      
      <!-- WHITE SECTION -->
    <!--  <section class="whiteSection clearfix aboutPeople">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3>Our Developers</h3>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="{{ asset('web_assets/img/boy-vector.jpg') }}" alt="Ashfaq Ali Zardari">
                <div class="caption">
                  <h5>Ashfaq Ali Zardari</h5>
                  <p>Full Stack Developer</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="{{ asset('web_assets/img/girl-vector.png') }}" alt="Bilquees Bano M.Ahmed">
                <div class="caption">
                  <h5>Bilquees Bano M.Ahmed</h5>
                  <p>Frontend Developer</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="thumbnail">
                <img src="{{ asset('web_assets/img/boy-vector.jpg') }}" alt="Muhammad Mustafa Ahmed">
                <div class="caption">
                  <h5>Muhammad Mustafa Ahmed</h5>
                  <p>Backend Developer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
-->
     
@endsection