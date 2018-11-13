<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('settlement_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('game_lavel')->nullable();
            $table->integer('balls')->nullable();
            $table->integer('bug')->nullable();
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
        Schema::dropIfExists('user_locations');
    }
}
