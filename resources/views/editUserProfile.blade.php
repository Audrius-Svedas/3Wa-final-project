@extends('layouts.app')

@section('content')

      <div id="banner" class="jumbotron row">
      	<h1>{{ __('Profile') }}</h1>
      </div>
      <section class="page-section">
        <div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-offset-4">
            <h2>{{ __('Edit your Profile') }}</h2>
        		<form class="" action="{{ route('updateProfile', Auth::user()->id) }}" method="POST" novalidate>
              @csrf
        			<div class="row">
        				<div class="col-xs-12 form-group">
        					<input name="name" type="text" value="{{ old('name', Auth::user()->name) }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name *') }}" required autofocus/>
        					<label for="name">{{ __('First Name') }}</label>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="surname" type="text" value="{{ old('surname', Auth::user()->surname) }}" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"  placeholder="{{ __('Last Name *') }}" required autofocus/>
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
            					<select name="year" class="form-control" required autofocus/>
                        <option value="" disabled selected>{{ __('Date') }}</option>
                      @for ($i=date('Y'); $i>1949; $i--)
                        <option value="{{ $i }}" {{ ($i == date('Y', strtotime(Auth::user()->date_of_birth)) ? "selected":"") }}>{{ $i }}</option>
                      @endfor
                      </select>
                      @if ($errors->has('year'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('year') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <select name="month" class="form-control" required autofocus/>
                        <option value="" disabled selected>{{ __('Of') }}</option>
                      @for ($i=1; $i<=12; $i++)
                        <option value="{{ $i }}" {{ ($i == date('m', strtotime(Auth::user()->date_of_birth)) ? "selected":"") }}>{{ $i }}</option>
                      @endfor
                      </select>
                      @if ($errors->has('month'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('month') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <select name="day" class="form-control"  value="" required autofocus/>
                        <option value="" disabled selected>{{ __('Birth *') }}</option>
                      @for ($i=1; $i<=31; $i++)
                        <option value="{{ $i }}" {{ ($i == date('d', strtotime(Auth::user()->date_of_birth)) ? "selected":"") }}>{{ $i }}</option>
                      @endfor
                      </select>
                      @if ($errors->has('day'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('day') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  placeholder="{{ __('Phone *') }}" required autofocus/>
        					<label for="phone">{{ __('Phone') }}</label>
                  @if ($errors->has('phone'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  placeholder="{{ __('Address *') }}" required autofocus/>
        					<label for="address">{{ __('Address') }}</label>
                  @if ($errors->has('address'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('address') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="city" value="{{ old('city', Auth::user()->city) }}" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  placeholder="{{ __('City *') }}" required autofocus/>
        					<label for="city">{{ __('City') }}</label>
                  @if ($errors->has('city'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('city') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 col-sm-6 form-group">
        					<select type="text" name="country" class="form-control"  value="" required autofocus/>
                    <option value="" disabled selected>{{ __('Country *') }}</option>
                  @foreach ($countries as $country)
          					<option value="{{ $country->id }}" {{ ($country->id == Auth::user()->country_id ? "selected":"") }}>{{ $country->name }}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('country'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('country') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 col-sm-6 form-group">
        					<input type="text" name="zip" value="{{ old('zip', Auth::user()->zip) }}" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}"  placeholder="{{ __('Zip *') }}" required autofocus/>
        					<label for="city">{{ __('Zip *') }}</label>
                  @if ($errors->has('zip'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('zip') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input type="text" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="{{ __('Email *') }}" required/>
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
        			<button class="btn btn-primary" type="submit">{{ __('Save Changes') }} <i class="fa fa-arrow-right"></i></button>
        		</form>
        	</div>
        </div>
      </section>


@endsection
