<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_lists', function (Blueprint $table) {
            $table->id();
//            $table->string('username');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('anime_id')->references('id')->on('animes');
            $table->integer('my_watched_episodes')->nullable();
            $table->dateTime('my_start_date')->nullable();
            $table->dateTime('my_finish_date')->nullable();
            $table->integer('my_score')->nullable();
            $table->integer('my_status')->nullable();
            $table->integer('my_rewatching')->nullable();
            $table->integer('my_rewatching_ep')->nullable();
            $table->dateTime('my_last_updated')->nullable();
            $table->string('my_tags')->nullable();
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
        Schema::dropIfExists('anime_lists');
    }
}
