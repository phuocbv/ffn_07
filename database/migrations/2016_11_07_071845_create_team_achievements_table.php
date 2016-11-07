<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('league_season_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->foreign('league_season_id')->references('id')->on('league_seasons');
            $table->foreign('team_id')->references('id')->on('teams');    
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
        Schema::drop('team_achievements');
    }
}
