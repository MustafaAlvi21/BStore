<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->double("stars");
            $table->string("comment");
            $table->uuid("skill_id")->nullable();
            $table->foreign("skill_id")->references("id")->on("skills");
            $table->uuid("product_id")->nullable();
            $table->foreign("product_id")->references("id")->on("products");
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('ratings');
    }
}
