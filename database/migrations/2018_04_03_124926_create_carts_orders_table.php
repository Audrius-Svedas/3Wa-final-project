<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->double('total_amount', 6,2);
        $table->double('tax_amount', 6,2);
        $table->boolean('shipping');
        $table->double('shipping_cost', 6,2);
        $table->string('shipping_address');
        $table->string('shipping_city');
        $table->string('shipping_zip');
        $table->string('shipping_country');
        $table->string('payment_status');
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users');
        });

    Schema::create('carts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('token')->nullable();
        $table->integer('product_id')->unsigned();
        $table->integer('order_id')->nullable()->unsigned();
        $table->timestamps();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');

        Schema::dropIfExists('orders');
    }
}
