<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string("message");
            $table->uuid("from");
            $table->foreign("from")->references("id")->on("users");
            $table->uuid("to");
            $table->foreign("to")->references("id")->on("users");
            $table->string("seen", 10);
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
        Schema::dropIfExists('messages');
    }
}
