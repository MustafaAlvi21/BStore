<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->primary()->unique();
            $table->uuid('order_id')->unique();
            $table->double("total", 8, 2);
            $table->string("delivery_status", 15)->default("pending");
            $table->string("address", 100);
            $table->integer("items");
            $table->date("order_date");
            $table->date("order_end_date");
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
        Schema::dropIfExists('deliveries');
    }
}
