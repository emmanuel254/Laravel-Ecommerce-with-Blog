<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageAndDescriptionColToMainCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('main_category', function (Blueprint $table) {
            $table->string('image')->nullable()->after('name');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_category', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }
}
