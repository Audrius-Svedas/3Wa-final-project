@extends('layouts.app')

@section('content')

      <div id="banner" class="jumbotron row">
      	<h1>{{ __('Edit the Product') }}</h1>
      </div>
      <section class="page-section">
        <div class="row">
        	<div class="col-xs-12 col-sm-4 col-md-offset-4">
            <h2>{{ __('Edit the Product') }}</h2>
        		<form class="" action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
        			<div class="row">
        				<div class="col-xs-12 form-group">
        					<input name="manufacturer" type="text" value="{{ old('manufacturer', $product->manufacturer) }}" class="form-control{{ $errors->has('manufacturer') ? ' is-invalid' : '' }}" placeholder="{{ __('Manufacturer *') }}" required autofocus/>
        					<label for="manufacturer">{{ __('Manufacturer') }}</label>
                  @if ($errors->has('manufacturer'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('manufacturer') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="model" type="text" value="{{ old('model', $product->model) }}" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}"  placeholder="{{ __('Model *') }}" required autofocus/>
        					<label for="model">{{ __('Model') }}</label>
                  @if ($errors->has('model'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('model') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input name="category" type="text" value="{{ old('category', $product->category) }}" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"  placeholder="{{ __('Category *') }}" required autofocus/>
        					<label for="category">{{ __('Category') }}</label>
                  @if ($errors->has('category'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('category') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
                  <input name="frame" type="text" value="{{ old('frame', $product->frame) }}" class="form-control{{ $errors->has('frame') ? ' is-invalid' : '' }}"  placeholder="{{ __('Frame *') }}" required autofocus/>
                  <label for="frame">{{ __('Frame') }}</label>
                  @if ($errors->has('frame'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('frame') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-xs-12 col-sm-6 form-group">
        					<select name="frame_size" class="form-control"  required autofocus/>
                    <option value="" disabled selected>{{ __('Frame Size *') }}</option>
                    @for ($i=16; $i<=22; $i+=2)
                      <option value="{{ $i }}" {{ ($i == $product->frame_size ? "selected":"") }}>{{ $i }}</option>
                    @endfor
                  </select>
                  @if ($errors->has('frame_size'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('frame_size') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="fork" value="{{ old('fork', $product->fork) }}" class="form-control{{ $errors->has('fork') ? ' is-invalid' : '' }}"  placeholder="{{ __('Fork *') }}" required autofocus/>
        					<label for="fork">{{ __('Fork') }}</label>
                  @if ($errors->has('fork'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('fork') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="gear_shifters" value="{{ old('gear_shifters', $product->gear_shifters) }}" class="form-control{{ $errors->has('gear_shifters') ? ' is-invalid' : '' }}"  placeholder="{{ __('Gear Shifters *') }}" required autofocus/>
        					<label for="gear_shifters">{{ __('Gear Shifters') }}</label>
                  @if ($errors->has('gear_shifters'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('gear_shifters') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="front_delailleur" value="{{ old('front_delailleur', $product->front_delailleur) }}" class="form-control{{ $errors->has('front_delailleur') ? ' is-invalid' : '' }}"  placeholder="{{ __('Front Delailleur *') }}" required autofocus/>
        					<label for="front_delailleur">{{ __('Front Delailleur') }}</label>
                  @if ($errors->has('front_delailleur'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('front_delailleur') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="rear_delailleur" value="{{ old('rear_delailleur', $product->rear_delailleur) }}" class="form-control{{ $errors->has('rear_delailleur') ? ' is-invalid' : '' }}"  placeholder="{{ __('Rear Delailleur *') }}" required autofocus/>
        					<label for="rear_delailleur">{{ __('Rear Delailleur') }}</label>
                  @if ($errors->has('rear_delailleur'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('rear_delailleur') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<input type="text" name="brakes" value="{{ old('brakes', $product->brakes) }}" class="form-control{{ $errors->has('brakes') ? ' is-invalid' : '' }}"  placeholder="{{ __('Brakes *') }}" required autofocus/>
        					<label for="brakes">{{ __('Brakes') }}</label>
                  @if ($errors->has('brakes'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('brakes') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 form-group">
            					<select name="gears_amount" class="form-control"  required autofocus/>
                        <option value="" disabled selected>{{ __('Amount of Gears*') }}</option>
                        @for ($i=18; $i<=27; $i+=3)
                          <option value="{{ $i }}" {{ ($i == $product->gears_amount ? "selected":"") }}>{{ $i }}</option>
                        @endfor
                      </select>
                      @if ($errors->has('gears_amount'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('gears_amount') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 form-group">
            					<select name="wheel_size" class="form-control"  required autofocus/>
                        <option value="" disabled selected>{{ __('Wheel Size*') }}</option>
                        @for ($i=26; $i<=29; $i++)
                          <option value="{{ $i }}" {{ ($i == $product->wheel_size ? "selected":"") }}>{{ $i }}</option>
                        @endfor
                      </select>
                      @if ($errors->has('wheel_size'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('wheel_size') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
        				</div>
        				<div class="col-xs-12 form-group">
        					<input type="text" name="weight" value="{{ old('weight', $product->weight) }}" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}"  placeholder="{{ __('Weight *') }}" required/>
        					<label for="weight">{{ __('Weight') }}</label>
                  @if ($errors->has('weightl'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('weight') }}</strong>
                      </span>
                  @endif
        				</div>
        				<div class="col-xs-12 form-group">
        					<input name="price" type="text" value="{{ old('price', $product->price) }}" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"  placeholder="{{ __('Price *') }}" required/>
        					<label for="price">{{ __('Price') }}</label>
                  @if ($errors->has('price'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('price') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
        					<textarea rows="10" cols="40" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  placeholder="{{ __('Description *') }}" required>{{ old('description', $product->description) }}</textarea>
                  @if ($errors->has('description'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 form-group">
                  <label for="imageUrl">{{ __('Photo') }}</label>
        					<input type="file" name="imageUrl" class="form-control{{ $errors->has('imageUrl') ? ' is-invalid' : '' }}" required/>
                  @if ($errors->has('imageUrl'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('imageUrl') }}</strong>
                      </span>
                  @endif
        				</div>
                <div class="col-xs-12 col-sm-7 form-group">
                  <select name="quantity" class="form-control"  required autofocus/>
                    <option value="" disabled selected>{{ __('Quantity of Products*') }}</option>
                    @for ($i=1; $i<=12; $i++)
                      <option value="{{ $i }}" {{ ($i == $product->quantity ? "selected":"") }}>{{ $i }}</option>
                    @endfor
                  </select>
                  @if ($errors->has('quantity'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('quantity') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
        			<button class="btn btn-primary" type="submit">{{ __('Save Changes') }} <i class="fa fa-arrow-right"></i></button>
        		</form>
        	</div>
        </div>
      </section>


@endsection
