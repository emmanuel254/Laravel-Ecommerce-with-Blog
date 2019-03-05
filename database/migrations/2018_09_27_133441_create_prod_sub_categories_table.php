<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodSubCategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('prodCategory_id')->unsigned();
            $table->timestamps();

            $table->foreign('prodCategory_id')->references('id')->on('prodCategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodSubCategories');
    }
}
