@extends('layouts.app')

@section('content')

  <div id="banner" class="jumbotron row">

  	<h1>Checkout</h1>

  </div>
  <section id="checkout" class="page-section row">

    <div class="col-sm-12 col-md-9">

  		<div id="checkout-page">
        <h2 class="inline-block">Shipping Information</h2>
        <br>

        <h3>If your shipping address is the same as your registered address, press confirm checkout!</h3>

        <br>
        <div class="h6">
        	<a data-toggle-mirror="on" data-toggle="collapse" class="btn btn-default btn-form-mirror" href="#shipping-info"><i class="fa fa-check"></i></a>
        	Change Shipping Information
        </div>

        <div id="shipping-info" class="row panel-collapse collapse">
        	<div class="col-sm-12 form-group">
            <input type="text" name="shipping_address" value="{{ old('shipping_address') }}" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}"  placeholder="{{ __('Address *') }}" required autofocus/>
  					<label for="shipping_address">{{ __('Address') }}</label>
            @if ($errors->has('shipping_address'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('shipping_address') }}</strong>
                </span>
            @endif
        	</div>
        	<div class="col-sm-6 form-group">
            <input type="text" name="shipping_city" value="{{ old('shipping_city') }}" class="form-control{{ $errors->has('shipping_city') ? ' is-invalid' : '' }}"  placeholder="{{ __('City *') }}" required autofocus/>
  					<label for="shipping_">{{ __('City') }}</label>
            @if ($errors->has('shipping_'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('shipping_') }}</strong>
                </span>
            @endif
        	</div>
        	<div class="col-sm-6 form-group">
            <input type="text" name="shipping_zip" value="{{ old('shipping_zip') }}" class="form-control{{ $errors->has('shipping_zip') ? ' is-invalid' : '' }}"  placeholder="{{ __('Zip *') }}" required autofocus/>
  					<label for="shipping_zip">{{ __('Zip') }}</label>
            @if ($errors->has('shipping_zip'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('shipping_zip') }}</strong>
                </span>
            @endif
        	</div>
        	<div class="col-sm-6 form-group">
            <select name="shipping_country" class="form-control"/>
            <option value="" disabled selected>{{ __('Country *') }}</option>
            @foreach ($countries as $country)
    					<option value="{{ $country->id }}" @if(old('country') == $country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
            @endforeach
            </select>
            @if ($errors->has('shipping_country'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('shipping_country') }}</strong>
                </span>
            @endif
        	</div>
        </div>


    		<div class="clearfix">
    			<a class="btn btn-primary btn-lg btn-checkout-step pull-right" href="#">Confirm Checkout<i class="fa fa-arrow-right"></i></a>
    		</div>
    		<input type="hidden" id="billing-current-step" name="step" value=""/>
        <input type="hidden" id="billing-next-step" name="nextStep" value="" />


      </div>
  	</div>

  	<div id="cart-totals" class="col-sm-12 col-md-3">
      <div id="cart-summary">
        <h3 class="cart-summary-title">Order Summary</h3>
        <ul class="price-list list-group">
            <li class="list-group-item">Subtotal: <span class="badge">subtotal</span></li>
            <li class="list-group-item order-shipping">Shipping: <span class="badge">Shipping</span></li>
            <li class="list-group-item order-total h4 clearfix"><span>Total:</span> <span class="badge">totals</span></li>
        </ul>
      </div>
  	</div>

  </section>


@endsection
