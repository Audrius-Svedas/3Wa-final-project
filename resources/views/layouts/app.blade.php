<!DOCTYPE html>
<html lang="en">
	<head>
    <!-- partial('layout-head') -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Page Title</title>

		<!-- Styles -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,800,300' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

		<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
		<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


	</head>
	<body>
		<main id="page-content" class="wrap container">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      	<div class="container">
      		<div class="navbar-header">
						<a class="navbar-brand" href="{{ route('index') }}"><img id="logo-img" src="http://smartspaceal.com/toaster/plugins/widcard/system/userdata/CorporateLogo.png" alt=""></a>
      		</div>
      		<div class="navbar-right navbar-utils">
      			<ul class="list-unstyled clearfix">
      				<li class="hidden-xs">
      					@if( Auth::user() && !Auth::user()->adminRole())
      						<a href="#">My Orders</a> |
      					  <a href="{{ route('editProfile') }}">My Profile</a>
      						<a href="{{ route('logout') }}" class="btn"
									onclick="event.preventDefault();
									         document.getElementById('logout-form').submit();"
									><span>Log Out</span> <i class="fa fa-unlock-alt"></i></a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
								@elseif(Auth::check() && Auth::user()->adminRole())
      						<a href="{{ route('createProduct') }}">Add a Product</a> |
      					  <a href="{{ route('editProfile') }}">Admin Profile</a>
      						<a href="{{ route('logout') }}" class="btn"
									onclick="event.preventDefault();
									         document.getElementById('logout-form').submit();"
									><span>Log Out</span> <i class="fa fa-unlock-alt"></i></a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
      					@else
      						<a href="{{ route('login') }}" class="btn"><span>Log In</span> <i class="fa fa-lock"></i></a>
      					@endif
      				</li>
      				<li id="navbar-totals" class="totals">
								<span class="hidden-xs cart-size">{{ $count }} Item</span>
								<span class="visible-md-lg cart-total">{{ $cartPrice }} €</span>
      				</li>
      				<li class="">
      					<a href="{{ route('showCart') }}" class="btn btn-primary cart-btn">
      						<i class="fa fa-shopping-cart"></i>
      					</a>
      				</li>
      			</ul>
      		</div>

      		<div class="navbar-collapse collapse">
      			<div class="navbar-left">
      				<ul id="cart" class="nav navbar-nav">
      				  <li class="">
      				    <a class="dropdown-toggle" id="shop-dropdown" href="{{ route('index') }}">
      				    Shop</a>
      				  </li>
      				</ul>
							<ul class="nav navbar-nav">
							  <li class=""><a href="#">About</a></li>
							  <li class=""><a href="#">Contact</a></li>
							</ul>
      			</div>
      		</div>
      	</div>
      </nav>

    @yield('content')

		</main>
    <footer id="page-footer">
    	<div class="container">
    		<div class="footer-contact text-center row">
    			<div class="col-xs-12 col-sm-4 col-lg-2 col-lg-offset-3">
    				<a href="#"><i class="fa fa-envelope-o"></i>info@bis.com</a>
    			</div>
    			<div class="col-xs-12 col-sm-4 col-lg-2">
    				<a href="#"><i class="fa fa-phone"></i>555.555.5555</a>
    			</div>
    			<div class="social-buttons col-xs-12 col-sm-4 col-lg-2">
    				<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
    				<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
    				<a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
    			</div>
    		</div>
    		<div class="footer-info wrap row">
    			<div class="col-sm-8">
    				<!-- content("footer-menu") -->
						<ul class="list-unstyled">
						  <li>&copy; BIS 2018</li>
						  <li><a href="#">Shop</a></li>
						  <li><a href="#">About</a></li>
						  <li><a href="#">Contact</a></li>

						</ul>
    			</div>
    			<div class="col-sm-4">
    				<p class="credit">Powered by <a href="">BIS BIKE LTD</a></p>
    			</div>
    		</div>
    	</div>
    </footer>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- <script src="{{ asset('js/main.min.js') }}"></script>
		<script src="{{ asset('js/plugins.min.js') }}"></script> -->

  </body>
</html>
