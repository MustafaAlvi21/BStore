<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string('name', 25);
            $table->binary("avatar")->nullable();
            $table->string('email', 120)->unique();
            $table->year('birth_year');	
            $table->string("gender", 6);
            $table->string("profile_info")->nullable();
            $table->string("skype_id", 80)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('wa_phone', 20)->nullable();
            $table->string('country', 80)->default("Pakistan");
            $table->string('state', 80)->nullable();
            $table->string("password", 80);
            $table->string("online_status")->default("offline");
            $table->datetime("online_at")->nullable();
            $table->string("account_status")->default("active");
            $table->uuid("deactive_by")->nullable();
            $table->foreign("deactive_by")->references("id")->on("admins");
            $table->string('deactive_reason')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE users MODIFY COLUMN avatar longblob;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
