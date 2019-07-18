<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('vendor_id');
            $table->integer('qty');
            $table->float('unit_price');
            $table->float('total_price');
            $table->string('date_ordered');
            $table->string('date_expected');
            $table->string('order_completed')->nullable();
            $table->string('order_canceled')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
