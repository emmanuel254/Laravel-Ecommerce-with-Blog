<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMainCategoryIdColToProdCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prodCategories', function (Blueprint $table) {
            $table->integer('main_category_id')->notnull()->after('name')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prodCategories', function (Blueprint $table) {
            $table->dropColumn('main_category_id');
        });
    }
}
