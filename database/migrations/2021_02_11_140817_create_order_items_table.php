<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
          $table->increments('id');
          $table->string('precio');
          $table->integer('quantity')->unsigned();
          $table->integer('producto_id')->unsigned();
          $table->foreign('producto_id')
                ->references('id')->on('productos')
                ->onDelete('cascade');
          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
}
