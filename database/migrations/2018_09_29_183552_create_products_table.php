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
            $table->string('title');
            $table->integer('category')->unsigned();
            $table->integer('subcategory')->unsigned();
            $table->float('price',10,2);
            $table->float('list_price',10,2);
            $table->text('image');
            $table->text('description');
            $table->timestamps();

            $table->foreign('category')->references('id')->on('prodCategories');
            $table->foreign('subcategory')->references('id')->on('prodSubCategories');
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
