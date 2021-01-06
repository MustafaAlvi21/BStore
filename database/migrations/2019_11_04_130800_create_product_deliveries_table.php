<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_deliveries', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string('name', 25);
            $table->string('email', 120)->unique();
            $table->string('phone', 20);
            $table->string('city');
            $table->string('state');
            $table->string('area');
            $table->string('address');
            $table->string('home_number')->nullable();
            $table->string('zip_code', 25);
            $table->string('region');
            $table->uuid("buy_id");
            $table->foreign("buy_id")->references("id")->on("make_offers");
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
        Schema::dropIfExists('product_deliveries');
    }
}
