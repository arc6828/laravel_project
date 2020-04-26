<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 1 คอลัมน์  เป็น type integer / nullable
            1 คอลัมน์  เป็น type float / nullable
            1 คอลัมน์  เป็น type string / nullable
            1 คอลัมน์  เป็น type date / nullable
            1 คอลัมน์  เป็น type text / nullable

         */
        Schema::create('warehouse', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('Code')->nullable();
            $table->float('price')->nullable();
            $table->string('name product')->nullable();
            $table->date('date')->nullable();
            $table->text('detail')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse');
    }
}
