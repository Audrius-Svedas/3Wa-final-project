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
              @foreach ($categories as $category)
                <li>
                    <a href="#" class=""><span class="badge">No</span>{{ $category->category }}</a>
                </li>
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
                      <form class="custom" action="" method="POST">
                        <div class="product-item text-center">
                          <a class="product-img" href="#">
                            <img class="img-responsive" src="{{ $product->imageUrl }}" alt="bicycle img" />
                          </a>
                          <h3 class="product-title">
                            <a href="#">{{ $product->manufacturer.' '.$product->model }}</a>
                          </h3>
                          <div class="h4 product-price">
                            <span>{{ $product->price }} <i class="fa fa-eur" aria-hidden="true"></i></span>
                          </div>
                          <div class="buttons-holder">
                              <input type="hidden" name="productId" value=""/>
                              <a class="btn btn-danger btn-add-cart" href="#" >Add to Cart</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  @endforeach


                </div>
              </div>
              <div class="pagination-holder">
                {{ $products->links() }}
              </div>
            </div>
        </div>
    </section>

@endsection
