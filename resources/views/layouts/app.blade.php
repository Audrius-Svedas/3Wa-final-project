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
		<!-- <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="owl-carousel/owl.theme.css" rel="stylesheet">
		<link href="chosen_v1.1.0/chosen.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <style type="text/css">
      .btn-primary,
      .ls-card-form .submit-button,
      .ls-card-form .delete-button {
        background-color: theme.btnPrimaryColor;
      }
      .btn-primary:hover,
      .ls-card-form .submit-button:hover,
      .ls-card-form .delete-button:hover {
        background-color: theme.btnPrimaryHoverColor;
      }
      .navbar-default .navbar-nav > li > a{
          color: theme.navbarLinkColor;
      }
      .navbar .container{
          background: theme.navbarBackgroundColor;
      }
    </style> -->
	</head>
	<body>
		<main id="page-content" class="wrap container">
      <!-- partial('layout-header') -->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      	<div class="container">
      		<div class="navbar-header">
      			<a class="navbar-brand" href=""><img src="" alt="">Logo</a>
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
      					@else
      						<a href="" class="btn"><span>Log In</span> <i class="fa fa-lock"></i></a>
      					@endif
      				</li>
      				<li id="navbar-totals" class="totals">
      					<!-- partial('shop-minicart-totals') -->
								<span class="hidden-xs">0 Item</span>
								<span class="visible-lg">$0.00</span>

      				</li>
      				<li class="dropdown">
      					<a href="#" data-toggle="dropdown" class="btn btn-primary cart-btn">
      						<i class="fa fa-shopping-cart"></i>
      					</a>
      					<div id="mini-cart" class="dropdown-menu">
      						<!-- partial('shop-minicart', {'edit_cart': true}) -->

									<ul class="cart-items list-unstyled hidden-xs">

										<li class="row cart-item">
										    <div class="product-thumb col-xs-4">
										        <img class="img-responsive" alt="product name" src="" />
										    </div>
										    <div class="product-info col-xs-8">
										        <h6 class="product-title">Product name</h6>
										        <div class="price">
										            1 x <span>price</span>
										        </div>
										        <a class="remove-item" href="#"
										        	data-ajax-handler=""
															data-ajax-update=""
															data-ajax-extra-fields=""><i class="fa fa-times"></i></a>
										    </div>
										</li>
									</ul>
								  <div class="mini-cart-totals">
								    <h4 class="subtotal">Subtotal: $$$</h4>
								    <a class="btn btn-default btn-lg" href="">View Cart</a>
								    <a class="col-xs-12 btn btn-danger solid btn-lg" href="">Checkout</a>
								  </div>
									<!-- <h6>No items in cart.</h6>									 -->
      					</div>
      				</li>
      			</ul>
      		</div>

      		<div class="navbar-collapse collapse">
      			<div class="navbar-left">
      				<ul id="main-nav" class="nav navbar-nav">
      				  <li class="dropdown ">
      				    <a class="dropdown-toggle" data-toggle="dropdown" id="shop-dropdown" href="">
      				    Shop <b class="caret"></b>
      				  	</a>
      	          <ul class="dropdown-menu" role="menu" aria-labelledby="shop-dropdown">
      	          	<li role="presentation">
      								<a href="" role="menuitem" tabindex="-1">Category name 1</a>
      							</li>
										<li role="presentation">
      								<a href="" role="menuitem" tabindex="-1">Category name 2</a>
      							</li>
      	          </ul>
      				  </li>
      				</ul>
      				<!-- content("header-menu") -->
							<ul class="nav navbar-nav">
							  <li class=""><a href="#">About</a></li>
							  <li class=""><a href="#">Blog</a></li>
							  <li class=""><a href="#">Contact</a></li>
							</ul>
      			</div>
      		</div>
      		<!--/.navbar-collapse -->
      	</div>
      </nav>

    @yield('content')

		</main>
    <!-- partial('layout-footer') -->
    <footer id="page-footer">
    	<div class="container">
    		<div class="footer-contact text-center row">
    			<div class="col-xs-12 col-sm-4 col-lg-2 col-lg-offset-3">
    				<a href="#"><i class="fa fa-envelope-o"></i>info@boxie.com</a>
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
						  <li>&copy; BOXIE! 2014</li>
						  <li><a href="#">Shop</a></li>
						  <li><a href="#">Profile</a></li>
						  <li><a href="#">About</a></li>
						  <li><a href="#">Blog</a></li>
						  <li><a href="#">Contact</a></li>
						  <li><a href="#">Terms &amp; Conditions</a></li>
						  <li><a href="#">Privacy Policy</a></li>
						</ul>
    			</div>
    			<div class="col-sm-4">
    				<p class="credit">Powered by <a href="">LemonStand</a></p>
    			</div>
    		</div>
    	</div>
    </footer>
		<!-- <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

    <script src="{{ asset('js/main.min.js') }}"></script>
		<script src="{{ asset('js/plugins.min.js') }}"></script>

    <!-- [[ if globals.active_page == 'shop' ]]
    	[[ partial('js-shop') ]]
    [[ endif ]] -->
  </body>
</html>
