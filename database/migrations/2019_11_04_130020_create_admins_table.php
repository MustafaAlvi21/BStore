<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->primary()->unique();
            $table->string("name", 25);
            $table->string("username", 25);
            $table->string("password", 80);
            $table->string("email", 100)->nullable();
            $table->string("online_status")->default("offline");
            $table->datetime("online_at")->nullable();
            $table->string("account_status")->default("active");
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
        Schema::dropIfExists('admins');
    }
}
