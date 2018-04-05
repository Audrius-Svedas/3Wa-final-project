<?php

namespace App\Http\Controllers;

use Auth;
use App\Helpers\CartHelper;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * @var CartHelper
     */
    private $cartHelper;


    // private $photoHelper;

    public function __construct(CartHelper $cartHelper) {
        $this->cartHelper = $cartHelper;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = [
          'token' => $request['_token'],
          'product_id' => $request['product_id']
        ];

        $cart = Cart::create($post);
        $product = Product::where('id', $request->product_id)->first();
        $cart->price = $product->price;

        // echo json_encode($cart);
        return redirect()->to('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cartItems = Cart::where('token', csrf_token())
        ->whereNull('order_id')->get();

        $productsInCart = [];
        foreach($cartItems as $cartItem) {
            $productsInCart[] = $cartItem->products;
        }


        // calculate quantity/Total/Vat/beforeVat values using Helpers from $summaryItems
        $quantity = $this->cartHelper->getQuantity($productsInCart);
        $total = $this->cartHelper->getTotal($productsInCart);
        $vat = $this->cartHelper->getVat($productsInCart);
        $beforeTaxes = $this->cartHelper->getBeforeTaxes($productsInCart);

        return view('cart', [
          'cartItems' => $cartItems,
          'quantity' => $quantity,
          'total' => $total,
          'vat' => $vat,
          'beforeTaxes' => $beforeTaxes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('showCart');
    }
}
