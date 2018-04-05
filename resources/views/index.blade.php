@extends('layouts.app')

@section('content')
    <div id="banner" class="jumbotron row">
      <h1>All Bicycles</h1>
    </div>
    <section id="shop" class="page-section row">
        <div class="col-xs-12 col-sm-3">
          <div class="sidebar">
            <h4>Categories</h4>
            <ul class="list-unstyled categories-group">
              @foreach ($productCategories as $productCategory)
              <form class="custom" action="{{ route('productByCategory') }}" method="POST">
                <li>
                    <input type="hidden" name="product_category" value="{{ $productCategory->category }}"/>
                    <button type="submit" class="btn" role="button">{{ $productCategory->category }}</button>
                </li>
              </form>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-9">
            <div id="product-list">
              <div class="product-grid">
                <div id="" class="row">
                  @foreach ($products as $product)

                    <div class="col-xs-12 col-sm-6 col-md-4 product-holder">
                      <div class="product-item text-center">
                        <a class="product-img" href="{{ route('showProduct', $product->id)}}">
                          <img class="img-responsive" src="{{ $product->url }}" alt="bicycle img" />
                        </a>
                        <h3 class="product-title">
                          <a href="{{ route('showProduct', $product->id)}}">{{ $product->manufacturer.' '.$product->model }}</a>
                        </h3>
                        <div class="h4 product-price">
                          <span>{{ $product->price }} <i class="fa fa-eur" aria-hidden="true"></i></span>
                        </div>
                        <form class="custom" action="{{ route('addToCart') }}" method="POST">
                          {{ csrf_field() }}
                          <div class="buttons-holder">
                              <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                              <button class="btn btn-danger btn-add-cart" type="submit">Add to Cart</button>
                          </div>
                        </form>
                        @if (Auth::check() && Auth::user()->adminRole())
                          <div class="product-item ">
                            <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-warning " role="button">Delete</a>
                            <a href="{{ route('editProduct', $product->id) }}" class="btn btn-info " role="button">Edit</a>
                          </div>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="text-center">
                @if (Auth::check() && Auth::user()->adminRole())
                <a href="{{ route('createProduct') }}" class="btn btn-primary" role="button">Insert New Product</a>
                @endif
              </div>
              <div class="pagination-holder">
                {{ $products->links() }}
              </div>
            </div>
        </div>
    </section>



@endsection
