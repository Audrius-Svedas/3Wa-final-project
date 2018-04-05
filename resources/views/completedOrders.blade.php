@extends('layouts.app')
@section('content')
    <h1 class="my-4">Orders</h1>

    <hr>

   <div class="panel panel-default">

@if (Auth::check() && Auth::user()->isAdmin())
      <h3>Orders Table for Admin</h3>
      <br>
      <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th></th>

              <th>Order ID</th>
              <th>Customer ID</th>
              <th>Customer Name</th>
              <th>Total Amount</th>
              <th>Tax Amount</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td></td>

                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->users->name }} {{ $order->users->surname }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->tax_amount }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Totals:</th>
              <th>{{ $quantity }}</th>
              <th></th>
              <th></th>
              <th></th>
              <th>{{ $totalSum }}</th>
              <th>{{ $totalTax }}</th>
              <th></th>
            </tr>
          </tfoot>
        </table>


      <br>
      <h3>Orders Table for User</h3>
      @endif

      <br>

        <table class="table table-bordered table-hover">
          <thead>
            <tr>

              <th>Order ID</th>
              <th>Product</th>
              <th>Price</th>
              <th>Created</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>


                <td>{{ $order->id }}</td>
                <td>
                  <ul>
                    @foreach ($order->carts as $cartItem)
                      <li><small><a href="#">{{ $cartItem->products->manufacturer.' '.$cartItem->products->model }}</a></small></li>
                    @endforeach
                  </ul>
                </td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->created_at }}</td>
                <td><span>{{ $order->payment_status }}</span>
                @if ($order->payment_status == 'payment_pending')
                <a href=" {{ route('make_payment', $order->id) }} " class="btn btn-danger btn-sm btn-block">Pay</a>

                @endif

                </td>
            </tr>
              @endforeach
          </tbody>
      </table>


    </div>




@endsection
