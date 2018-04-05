<?php

namespace App\Http\Controllers;

use App\Helpers\CartHelper;
use App\Helpers\PayseraHelper;
use Auth;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct(CartHelper $cartHelper, PayseraHelper $payseraHelper) {
         $this->cartHelper = $cartHelper;
         $this->payseraHelper = $payseraHelper;
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('order');
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
        if(!Auth::check()){
            return redirect('/login');
        }
        $post = $request->except('_token');

        // 3 possible payment statuses available:
        // payment_pending
        // payment_confirmed
        // payment_canceled

        // $post['payment_status'] = 'payment_pending';

        $post = [
          'payment_status' => 'payment_pending',
          'shipping_address' => NULL,
          'shipping_city' => NULL,
          'shipping_zip' => NULL,
          'shipping_country' => NULL
        ];

        $order = Order::create($post);

        //update user_id field in carts table for successfuly ordered cart Items
        $cartItems = Cart::where('token', csrf_token())
        ->whereNull('order_id')
        ->get();

        foreach ($cartItems as $cartItem) {
          $cartItem->order_id = $order->id;

          $cartItem->save();
        }

        return redirect()->route('editOrder');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->adminRole()){
          $orders = Order::get();
        }
        else{
          $orders = Order::where('user_id', Auth::user()->id)->get();
        }

        $ordersArray = [];
        foreach($orders as $order) {
          $ordersArray[] = $order;
        }

        $cartItems = Cart::where('order_id', $order)->get();

        $productNamesArray = [];
        foreach($cartItems as $cartItem){
          $productNames = $cartItem->products->name;
          $productNamesArray[] = $productNames;
        }

        $quantity = $this->cartHelper->getQuantity($ordersArray);
        $totalSum = $this->cartHelper->getSum(array_pluck($orders, 'total_amount'));
        $totalTax = $this->cartHelper->getSum(array_pluck($orders, 'tax_amount'));


        return view ('order', [
          'quantity' => $quantity,
          'totalSum' => $totalSum,
          'totalTax' => $totalTax,
          'orders' => $ordersArray,
          'productName' => $productNamesArray
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view ('order', [
          'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request);

        $post = [
          'shipping_address' => $request->get('shipping_address'),
          'shipping_city' => $request->get('shipping_city'),
          'shipping_zip' => $request->get('shipping_zip'),
          'shipping_country' => $request->get('shipping_country')
        ];

        $order = Order::findOrFail($id);
        $order->update($post);

        $this->payseraHelper->payseraPay($order->id, $order->total_amount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('index');
    }

    public function paymentSuccess() {

      $orderId = $this->payseraHelper->updatePaymentStatus();

      Order::findOrFail($orderId)->update([
        'payment_status' => 'payment_confirmed'
      ]);

      return view('paymentSuccess');
    }

    public function paymentCancel() {

      return view('paymentCancel');
    }


    public function payNow($id) {
      $orderAmount = Order::findOrFail($id)->total_amount;
      $this->payseraHelper->payseraPay($id, $orderAmount);

    }

    protected function validator($data)
    {
        return $data->validate([
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_zip' => 'required|string|max:10'
          ]);
    }
}
