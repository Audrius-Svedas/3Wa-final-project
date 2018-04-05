<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('manufacturer');
          $table->string('model');
          $table->integer('quantity');
          $table->string('category');
          $table->double('frame_size', 3,1);
          $table->string('frame');
          $table->string('fork');
          $table->string('gear_shifters');
          $table->string('front_delailleur');
          $table->string('rear_delailleur');
          $table->string('brakes');
          $table->integer('gears_amount');
          $table->double('wheel_size', 3,1);
          $table->double('weight', 4,2);
          $table->double('price', 6,2);
          $table->string('description');
          $table->string('imageUrl')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
