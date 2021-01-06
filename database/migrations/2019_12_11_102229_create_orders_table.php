<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = "InnoDB";
            $table->uuid('id')->primary()->unique();
            $table->uuid('order_id');
            $table->integer("quantity");
            $table->double("sub_total", 8, 2);
            $table->uuid("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->uuid("vendor_id");
            $table->foreign("vendor_id")->references("id")->on("users");
            $table->string('status', 15)->default('pending');
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
