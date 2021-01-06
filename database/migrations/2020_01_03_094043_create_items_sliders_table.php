<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_sliders', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->uuid('id')->primary()->unique();
            $table->binary('slide');
            $table->string('type');
            $table->uuid('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->timestamps();
        });
        DB::statement("alter table items_sliders modify column slide longblob");            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_sliders');
    }
}
