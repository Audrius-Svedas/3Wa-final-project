@extends('layouts.app')

@section('content')

      <div id="banner" class="jumbotron row">
      	<h1>{{ __('Register') }}</h1>
      </div>
      <section class="page-section">
        <div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-offset-4">
            <h2>{{ __('Register a New Account') }}</h2>
        		<form class="" action="{{ route('register') }}" method="POST">
              @csrf
        			<div class="row">
        				<div class="col-xs-12 form-group">
        					<input name="name" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name *') }}" required autofocus/>
        					<label for="name">{{ __('First Name') }}</label>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="surname" type="text" value="{{ old('surname') }}" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"  placeholder="{{ __('Last Name *') }}" required autofocus/>
        					<label for="surname">{{ __('Last Name') }}</label>
                  @if ($errors->has('surname'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('surname') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
                  <div class="row">
                    <div class="col-xs-12 col-sm-4">
            					<select type="number" name="year" class="form-control"  value="" required autofocus/>
                        <option value="">{{ __('Date') }}</option>
                      @for ($i=date('Y'); $i>1949; $i--)
                        <option value="{{ $i }}" @if(old('year') == $i) {{ 'selected' }} @endif>{{ $i }}</option>
                      @endfor
                      </select>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <select type="number" name="month" class="form-control"  value="" required autofocus/>
                        <option value="">{{ __('Of') }}</option>
                      @for ($i=1; $i<=12; $i++)
                        <option value="{{ $i }}" @if(old('month') == $i) {{ 'selected' }} @endif>{{ $i }}</option>
                      @endfor
                      </select>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <select type="number" name="day" class="form-control"  value="" required autofocus/>
                        <option value="">{{ __('Birth *') }}</option>
                      @for ($i=1; $i<=31; $i++)
                        <option value="{{ $i }}" @if(old('day') == $i) {{ 'selected' }} @endif>{{ $i }}</option>
                      @endfor
                      </select>
                    </div>
                  </div>
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="phone" value="{{ old('phone') }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  placeholder="{{ __('Phone *') }}" required autofocus/>
        					<label for="phone">{{ __('Phone') }}</label>
                  @if ($errors->has('phone'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="address" value="{{ old('address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  placeholder="{{ __('Address *') }}" required autofocus/>
        					<label for="address">{{ __('Address') }}</label>
                  @if ($errors->has('address'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('address') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="city" value="{{ old('city') }}" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  placeholder="{{ __('City *') }}" required autofocus/>
        					<label for="city">{{ __('City') }}</label>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-6 form-group">
        					<select type="text" name="country" class="form-control"  value="" required autofocus/>
                    <option value="">{{ __('Country *') }}</option>
                  @foreach ($countries as $country)
          					<option value="{{ $country->id }}" @if(old('country') == $country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
                  @endforeach
                  @if ($errors->has('country'))
                      <span class="help-block">
                          <strong>{{ $errors->first('country') }}</strong>
                      </span>
                  @endif
                  </select>
        				</div>
                <div class="col-xs-12 col-sm-6 form-group">
        					<input type="text" name="zip" value="{{ old('zip') }}" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"  placeholder="{{ __('Zip *') }}" required autofocus/>
        					<label for="city">{{ __('Zip') }}</label>
                  @if ($errors->has('zip'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('zip') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input type="text" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="{{ __('Email *') }}" required/>
        					<label for="email">{{ __('Email') }}</label>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="password" type="password" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  placeholder="{{ __('Password *') }}" required/>
        					<label for="password">{{ __('Password') }}</label>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="password_confirmation" type="password" class="form-control"  placeholder="{{ __('Confirm Password *') }}" required/>
        					<label for="password_confirmation">{{ __('Confirm Password') }}</label>
        				</div>
        				<!-- <input type="hidden" name="autologin" value="1" />
        				<input type="hidden" name="redirect" value=""/> -->
        			</div>
        			<button class="btn btn-primary" type="submit">{{ __('Register') }} <i class="fa fa-arrow-right"></i></button>
        		</form>
        	</div>
        </div>
      </section>


@endsection
