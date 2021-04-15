<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
//            $table->string('user_id');
            $table->string('username')->nullable();
            $table->integer('user_watching')->nullable();
            $table->integer('user_completed')->nullable();
            $table->integer('user_onhold')->nullable();
            $table->integer('user_dropped')->nullable();
            $table->integer('user_plantowatch')->nullable();
            $table->float('user_days_spent_watching')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('access_rank')->nullable();
            $table->date('join_date')->nullable();
            $table->dateTime('last_online')->nullable();
            $table->float('stats_mean_score')->nullable();
            $table->integer('stats_rewatched')->nullable();
            $table->integer('stats_episodes')->nullable();
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
        Schema::dropIfExists('users');
    }
}
