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
            $table->increments('pro_id')->comment('รหัสสินค้า');
            $table->string('pro_name')->nullable()->comment('ชื่อสินค้า');
            $table->integer('pro_price')->nullable()->comment('ราคาขาย');
            $table->float('pro_cost',16,2)->nullable()->comment('ต้นทุน');
            $table->date('pro_date')->nullable()->comment('วันที่ที่นำสินค้าเข้า');
            $table->text('pro_remark')->nullable()->comment('หมายเหตุ');
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
