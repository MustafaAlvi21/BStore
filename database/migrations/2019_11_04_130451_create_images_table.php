<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->binary('image');
            $table->uuid("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->string("active_status")->default("active");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE images MODIFY COLUMN image longblob;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
