@extends('layouts.app')

@section('content')

    <div itemscope itemtype="">
    	<div id="banner" class="jumbotron row">
    		<h1 itemprop="name">{{ $product->manufacturer.' '.$product->model }}</h1>
    	</div>
    	<section id="single-product" class="page-section">
    		<!-- code_block('breadcrumbs') -->
    		<form class="custom" action="" onsubmit="return false" method="post">

    				<div class="row">
    					<div id="product-images">
    						<!-- partial('shop-product-gallery') -->
                <div class="col-xs-12 col-sm-6">


                			<div class="item" >
                				<div class="">
                					<img class="img-responsive" alt="bicycle img" src="{{ $product->url }}" itemprop="image"/>
                				</div>
                			</div>

                </div>

    					<div id="product-page">
    						<!-- partial('shop-product') -->
                <div class="col-sm-6">
                	<h1 itemprop="name">{{ $product->manufacturer.' '.$product->model }}</h1>

                	<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                		<h2 >{{ $product->price }} <i class="fa fa-eur" aria-hidden="true"></i></h2>
                  </div>
            			 <!-- partial('shop-product-options')  -->
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <h5 class="title" for="frame size">Frame size</h5>
                      <select id="frame size" name="frame size" class="product-option form-control">
                        <option value="{{ $product->frame_size }}">{{ $product->frame_size }}</option>
               			  </select>
                    </div>
                  </div>

                  <input type="hidden" name="productId" value="{{ $product->id }}"/>
              		<div class="add-cart-holder form-group">
                    <form class="custom" action="{{ route('addToCart') }}" method="POST">
                      {{ csrf_field() }}
                      <div class="buttons-holder">
                          <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                          <button class="btn btn-lg btn-danger btn-add-cart" type="submit">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                      </div>
                    </form>
              			<a class="btn btn-lg btn-danger btn-add-cart" href="#">Add to Cart <i class="fa fa-shopping-cart"></i></a>
              		</div>
                </div>
              </div>
              <!-- <div class="row"> -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    <li><a data-toggle="tab" href="#menu">Specifications</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <h2>{{ $product->manufacturer.' '.$product->model }}</h2>
                      <p>{{ $product->description }}</p>
                    </div>
                    <div id="menu" class="tab-pane fade">
                      <h2>Configuration:</h2>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <td>Frame</td>
                                <td>{{ $product->frame }}</td>
                              </tr>
                              <tr>
                                <td>Fork</td>
                                <td>{{ $product->fork }}</td>
                              </tr>
                              <tr>
                                <td>Gear shifters</td>
                                <td>{{ $product->gear_shifters }}</td>
                              </tr>
                              <tr>
                                <td>Front delailleur</td>
                                <td>{{ $product->front_delailleur }}</td>
                              </tr>
                              <tr>
                                <td>Rear delailleur</td>
                                <td>{{ $product->rear_delailleur }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <td>Brakes</td>
                                <td>{{ $product->brakes }}</td>
                              </tr>
                              <tr>
                                <td>Gear amount</td>
                                <td>{{ $product->gears_amount }}</td>
                              </tr>
                              <tr>
                                <td>Wheel size</td>
                                <td>{{ $product->wheel_size }}</td>
                              </tr>
                              <tr>
                                <td>Weight</td>
                                <td>{{ $product->weight }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- </div> -->
    				</div>
    		</form>

    	</section>
    </div>

@endsection
