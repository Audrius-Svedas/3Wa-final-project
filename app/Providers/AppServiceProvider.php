<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Dish;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

      View::composer('*', function ($view) {
          $count = Cart::where('token', csrf_token())->whereNull('order_id')->count();
          View::share('count', $count);


          $products = Cart::where('token', csrf_token())->whereNull('order_id')->get();
          $cartPrice = 0;

          foreach ($products as $product) {
             $cartPrice = $cartPrice + $product->products->price;
          }
          View::share('cartPrice', $cartPrice);

          $diferentCartItems = Cart::where('token', csrf_token())
          ->whereNull('order_id')->get();
          View::share('diferentCartItems', $diferentCartItems);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
