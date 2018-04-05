@extends('layouts.app')

@section('content')

<div id="banner" class="jumbotron row">

      	<h1>Shopping Cart</h1>

      </div>

      <section id="cart" class="page-section row">
      	<form class="custom" action="" method="post">
      		<div id="cart-content">
            <!-- partial('shop-cart-content') -->
            <div class="col-xs-12 col-md-9">
              <div class="items-holder">
                  <!-- partial('shop-cart-items', {'edit_cart': true}) -->
                  <div class="cart-labels clearfix hidden-xs">
                  	<div class="col-sm-4 col-sm-offset-1 col-lg-5">
                  		Item
                  	</div>
                  	<div class="col-sm-3 col-lg-2">
                  		Quantity
                  	</div>
                  	<div class="col-sm-3 col-lg-3">
                  		Item Total
                  	</div>
                  </div>
                  @foreach ($cartItems as $cartItem)
                  <div class="cart-item row">
                  	<div class="col-xs-12 col-sm-2">
                  		<div class="product-thumb">
                  			<img class="img-responsive" alt="product img" src="{{ $cartItem->products->url }}" />
                  		</div>
                  	</div>
                  	<div class="col-xs-12 col-sm-offset-1 col-sm-3 col-lg-3 cart-details">
                  		<div class="h4 product-title">
                  			<a href="#">{{ $cartItem->products->manufacturer.' '.$cartItem->products->model }}</a>
                  			<p><small class="unit-price">
                  				{{ $cartItem->products->price }} €
                  			</small></p>
                  		</div>
                  	</div>
                  	<div class="col-xs-12 col-sm-3 col-lg-2">
                  		<div class="h4 quantity">
                  				<div class="quantity-selector">

                  					<input type="number" name="item_quantity" class="form-control quantity" value="1">

                  				</div>
                  		</div>
                  	</div>
                  	<div class="col-xs-12 col-sm-3 col-lg-3 cart-details">
                  		<div class="h4 total-price">
                  			{{ $cartItem->products->price }} €
                  		</div>
                  		<a class="remove-item" href="{{ route('deleteCartItem', $cartItem->id) }}"><i class="fa fa-times"></i></a>
                  	</div>
                  </div>
                  @endforeach
              </div>

              <div id="cart-actions" class="btn-holder clearfix">
                  <a class="btn btn-default btn-continue-shopping" href="{{ route('index') }}" ><i class="fa fa-arrow-left"></i> Continue Shopping</a>
              </div>
          </div>

          <div class="col-xs-12 col-md-3">
              <h3>Order Summary</h3>
              <p class="h6">Shipping costs and taxes will be evaluated during checkout</p>
              <ul class="price-list list-group">
                  <li class="list-group-item">Subtotal: <span class="badge">{{ $total }} €</span></li>
              </ul>
              <form action="{{ route('order') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="total_amount" value="{{ $total }}">
                <input type="hidden" name="tax_amount" value="{{ $vat }}">
                <input type="hidden" name="shipping" value="NULL">
                <input type="hidden" name="shipping_cost" value="10">
                <input type="hidden" name="user_id" value="
                @if( Auth::user())
                {{ Auth::user()->id }}
                @endif">
                <button class="col-xs-12 btn btn-danger solid btn-lg" name="button" type="submit">Checkout</button>
              </form>




          </div>
          </div>
      	</form>
      </section>



@endsection
