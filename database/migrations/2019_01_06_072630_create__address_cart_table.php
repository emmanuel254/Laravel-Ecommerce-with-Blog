<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('product_id');
            $table->integer('product_qty');
            $table->float('product_price',10,2);
            $table->float('subtotal',10,2);

            $table->string('fullName');
            $table->string('email');
            $table->string('phone_number');
            $table->string('town');
            $table->string('landmark');
            $table->string('address_type');
            $table->string('address');
            $table->string('pickup_point');
            $table->string('payment_method')->default('cash');

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
        Schema::dropIfExists('address_cart');
    }
}
