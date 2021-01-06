<!-- FOOTER -->
<div class="footer clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-12">
				<div class="footerLink">
					<h5>Catchmango</h5>
					<ul class="list-unstyled">
						<li><a href="{{ URL::to('/terms_conditions') }}">Terms and Conditions </a></li>
						<li><a href="{{ URL::to('/privacy_policy') }}">Privacy Policy </a></li>
						<li><a href="{{ URL::to('/contact_us') }}">Contact Us </a></li>
						<li><a href="{{ URL::to('/about_us') }}">About Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-12">
				<div class="footerLink">
					<h5>Skills</h5>
					<ul class="list-unstyled">
						@foreach(App\skill::orderBy("created_at", "desc")->take(5)->get() as $item)
						<li><a href="{{ URL::to('skill/'.$item->id) }}">{{ $item->name }} </a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-12">
				<div class="footerLink">
					<h5>Products</h5>
					<ul class="list-unstyled">
						@foreach(App\product::orderBy("created_at", "desc")->take(5)->get() as $item)
						<li><a href="{{ URL::to('product/'.$item->id) }}">{{ $item->name }} </a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-3 col-12">
				<div class="footerLink">
					<h5>Get in Touch</h5>
					<ul class="list-unstyled">
						<li><a href="tel:+923426599549">Call us at (342)-659-9549</a></li>
						<li><a href="mailto:support@catchmango.com">support@catchmango.com</a></li>
					</ul>
					<ul class="list-inline">
						<li><a href="{{ URL::to('https://twitter.com/catchmango') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{ URL::to('https://www.facebook.com/catchmango') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ URL::to('https://plus.google.com/102382385121718478389') }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- COPY RIGHT -->
<div class="copyRight clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-12">
				<p>&copy; <script>document.write(new Date().getFullYear());</script> Copyright {{ config('app.name', 'Catchmango') }} <!--  develop by <a target="_blank" href="{{ URL::to('http://mvfp.000webhostapp.com/') }}">Ashfaq Ali Zardari</a>. --></p>
			</div>
			<div class="col-md-5 col-12">
				<!-- <ul class="list-inline">
					<li><img src="{{ asset('web_assets/img/home/footer/card1.png') }}"></li>
					<li><img src="{{ asset('web_assets/img/home/footer/card2.png') }}"></li>
					<li><img src="{{ asset('web_assets/img/home/footer/card3.png') }}"></li>
					<li><img src="{{ asset('web_assets/img/home/footer/card4.png') }}"></li>
				</ul> -->
			</div>
		</div>
	</div>
</div>