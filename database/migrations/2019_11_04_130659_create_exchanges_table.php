<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->primary()->unique();
            $table->uuid("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->uuid("exchange_product");
            $table->foreign("exchange_product")->references("id")->on("products");
            $table->uuid("exchange_user");
            $table->foreign("exchange_user")->references("id")->on("users");
            $table->string("status", 15)->default("pending");
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
        Schema::dropIfExists('exchanges');
    }
}
