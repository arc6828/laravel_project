<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tidas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('Product')->nullable();
            $table->string('price')->nullable();
            $table->text('values')->nullable();
            $table->integer('Amount')->nullable();
            $table->float('totals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tidas');
    }
}
