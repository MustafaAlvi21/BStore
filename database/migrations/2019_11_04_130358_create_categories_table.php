<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string('name', 30)->unique();
            $table->string('category_type', 30); 
            $table->string("active_status")->default("active");
            $table->uuid("deactive_by")->nullable();
            $table->foreign("deactive_by")->references("id")->on("admins");
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
        Schema::dropIfExists('categories');
    }
}
