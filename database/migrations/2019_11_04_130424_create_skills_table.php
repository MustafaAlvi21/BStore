<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->priamry()->unique();
            $table->string('name', 255);
            $table->binary("image");
            $table->string("video_link")->nullable();
            $table->longText("description");
            $table->uuid("category_id")->nullable();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->uuid("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE skills MODIFY COLUMN image longblob;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
