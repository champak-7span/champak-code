<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('order_no')->unique();
            $table->integer('subtotal');
            $table->integer('total');
            $table->integer('qty');
            $table->text('address', 1024);
            $table->integer('user_id');
            $table->integer('createdby')->nullable();
            $table->integer('updatedby')->nullable();
            $table->integer('deletedby')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
