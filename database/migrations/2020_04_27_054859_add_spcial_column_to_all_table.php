<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpcialColumnToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text("special")->nullable();
        });
        Schema::table('stocks', function (Blueprint $table) {
            $table->text("special")->nullable();
        });
        Schema::table('warehouse', function (Blueprint $table) {
            $table->text("special")->nullable();
        });
        Schema::table('personnel', function (Blueprint $table) {
            $table->text("special")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hello', function (Blueprint $table) {
            //
        });
    }
}
