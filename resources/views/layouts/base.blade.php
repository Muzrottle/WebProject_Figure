<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Funko</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/slick/slick-theme.css') }}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @livewireStyles

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="/">
						<!-- replace logo here -->
						<img src="{{ asset('images/logo.png') }}" width="150" height="50">
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Cart</a>
						<div class="dropdown-menu cart-dropdown">
							@php
								$counter = 0;
							@endphp
							@if(Cart::count() > 0)
								@foreach (Cart::content() as $item)
									<!-- Cart Item -->
									<div class="media">
										<a class="pull-left" href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
											<img class="media-object" src="{{ asset('images/shop/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}" />
										</a>
										<div class="media-body">
											<h4 class="media-heading" style="padding-right: 1%"><a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a></h4>
											<div class="cart-price">
												<span>{{ $item->qty }} x</span>
												<span>{{ $item->model->regular_price }}</span>
											</div>
											<h5><strong>${{ $item->model->regular_price }}</strong></h5>
										</div>
										<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
									</div><!-- / Cart Item -->
									@php
										$counter++;
									@endphp
									@if ($counter === 2)
										<div style="margin-top: 2%">
											<strong>...</strong>
										</div>
										<p style="float:inline-end;">In Cart (<strong>{{ Cart::count() }}</strong>)</p>
										@php
										break;
										@endphp
									@endif
								@endforeach
							@else
								<p>Cart is empty.</p>
							@endif
							

							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price" style="float:inline-end;">${{ Cart::subtotal() }}</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="/cart" class="btn btn-small">View Cart</a></li>
								<li><a href="/checkout" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->


					@livewire('header-search-component')


					@if (Route::has('login'))
						@auth
							@if(Auth::user()->utype === 'ADM')
								<!-- My Account -->
								<li class="dropdown dropdown-slide">
									<a title="My Account" href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">My Account</a>
									<div class="dropdown-menu cart-nav">
										<div class="cart-summary media">
											<a title="Categories" href="{{ route('admin.categories') }}">Categories</a>
										</div>
										<div class="cart-summary media">
											<a title="Products" href="{{ route('admin.products') }}">All Products</a>
										</div>
										<div class="cart-summary media">
											<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</div>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
									</div>
								</li><!-- / My Account -->
							@else
								<!-- My Account -->
								<li class="dropdown dropdown-slide">
									<a title="My Account" href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">My Account</a>
									<div class="dropdown-menu cart-nav">
										<div class="cart-summary media">
											<a title="Dashboard" href="{{ route('user.profile') }}">Dashboard</a>
										</div>
										<div class="cart-summary media">
											<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										</div>
										<form id="logout-form" method="POST" action="{{ route('logout') }}">
											@csrf
										</form>
									</div>
								</li><!-- / My Account -->
							@endif

						@else
							<!-- Login/Register -->
							<li><a href="{{route('login')}}">Login</a></li>
							<li><a href="{{route('register')}}">Register</a></li>
							<!-- / Login/Register -->
						@endif
						
					@endif

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->

<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="/">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-12 col-md-12 mb-sm-3">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="/shop">Shop</a></li>
										<li><a href="/checkout">Checkout</a></li>
										<li><a href="/cart">Cart</a></li>

									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->

					<!-- Pages -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Info <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Introduction</li>
										<li role="separator" class="divider"></li>
										<li><a href="/contactus">Contact Us</a></li>
										<li><a href="/aboutus">About Us</a></li>

									</ul>
								</div>

								<!-- Layout -->
								<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Dashboard</li>
										<li role="separator" class="divider"></li>
										<li><a href="/dashboard">User Interface</a></li>
										<li><a href="/orders">Orders</a></li>
										<li><a href="/address">Address</a></li>
										<li><a href="/profile">Profile Details</a></li>
									</ul>
								</div>

							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Pages -->

				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

{{$slot}}

<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/themefisher">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/themefisher">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://www.twitter.com/themefisher">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://www.pinterest.com/themefisher/">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.html">CONTACT</a>
					</li>
					<li>
						<a href="/shop">SHOP</a>
					</li>
					<li>
						<a href="pricing.html">Pricing</a>
					</li>
					<li>
						<a href="contact.html">PRIVACY POLICY</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('plugins/instafeed/instafeed.min.js')}}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('plugins/slick/slick.min.js')}}"></script>
    <script src="{{ asset('plugins/slick/slick-animation.min.js')}}"></script>

    <!-- Google Mapl -->
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw')}}"></script>
    <script type="text/javascript" src="{{ asset('plugins/google-map/gmap.js')}}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('js/script.js')}}"></script>
	<script src="{{ asset('https://kit.fontawesome.com/c69d147697.js')}}" crossorigin="anonymous"></script>
    @livewireScripts


  </body>
  </html>
