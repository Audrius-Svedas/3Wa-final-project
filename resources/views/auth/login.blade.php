@extends('layouts.app')

@section('content')

<div id="banner" class="jumbotron row">
      	<h1>{{ __('Login') }}</h1>
      </div>
      <section class="page-section">
        <div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-offset-4">
        		<form class="" action="{{ route('login') }}" method="POST">
              @csrf
              <h2>{{ __('Login') }}</h2>
        			<div class="row">
        				<div class="col-xs-12 form-group">
        					<input type="email" name="email" id="email" class="form-control" placeholder="{{ __('Email *') }}" value="">
        					<label for="email">{{ __('Email') }}</label>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif

        				</div>
        				<div class="col-xs-12">
        					<input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password *') }}">
        					<label for="password">{{ __('Password') }}</label>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

        				</div>
                <div class="col-xs-6 form-group">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                      </label>
                  </div>
        				</div>
                <div class="col-xs-6 form-group">
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
        				</div>
        				<div class="col-xs-12 form-group clearfix">
        					<a class="btn btn-default forget-link pull-left" href="{{ route('register') }}">{{ __('Register a New Account') }}</a>
        					<button class="btn btn-primary pull-right" type="submit">{{ __('Login') }}<i class="fa fa-lock"></i></button>

        					<input type="hidden" name="redirect" value="#"/>
        				</div>
        			</div>
        		</form>
        	</div>
        </div>
      </section>


@endsection
