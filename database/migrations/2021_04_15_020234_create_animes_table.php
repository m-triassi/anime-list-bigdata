<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
//            $table->string('anime_id');
            $table->string('title')->nullable();
            $table->string('title_english')->nullable();
            $table->string('title_japanese')->nullable();
            $table->text('title_synonyms')->nullable();
            $table->string('image_url')->nullable();
            $table->string('type')->nullable();
            $table->string('source')->nullable();
            $table->integer('episodes')->nullable();
            $table->string('status')->nullable();
            $table->boolean('airing')->nullable();
            $table->string('aired_string')->nullable();
            $table->string('aired')->nullable();
            $table->string('duration')->nullable();
            $table->string('rating')->nullable();
            $table->float('score')->nullable();
            $table->integer('scored_by')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('popularity')->nullable();
            $table->integer('members')->nullable();
            $table->integer('favorites')->nullable();
            $table->text('background')->nullable();
            $table->string('premiered')->nullable();
            $table->string('broadcast')->nullable();
            $table->text('related')->nullable();
            $table->text('producer')->nullable();
            $table->string('licensor')->nullable();
            $table->string('studio')->nullable();
            $table->string('genre')->nullable();
            $table->text('opening_theme')->nullable();
            $table->text('ending_theme')->nullable();
            $table->integer('duration_min')->nullable();
            $table->integer('aired_from_year')->nullable();
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
        Schema::dropIfExists('animes');
    }
}
