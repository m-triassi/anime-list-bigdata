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
            $table->string('username');
            $table->integer('user_watching');
            $table->integer('user_completed');
            $table->integer('user_onhold');
            $table->integer('user_dropped');
            $table->integer('user_plantowatch');
            $table->float('user_days_spent_watching');
            $table->string('gender');
            $table->string('location');
            $table->date('birth_date');
            $table->string('access_rank');
            $table->date('join_date');
            $table->dateTime('last_online');
            $table->float('stats_mean_score');
            $table->integer('stats_rewatched');
            $table->integer('stats_episodes');
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
