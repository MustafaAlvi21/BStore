<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string("comment");
            $table->uuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->uuid("skill_id");
            $table->foreign("skill_id")->references("id")->on("skills");
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
        Schema::dropIfExists('comments');
    }
}
