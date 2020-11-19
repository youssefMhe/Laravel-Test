<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('Score');
            $table->bigInteger('equipe_locaux_id')->unsigned();
            $table->bigInteger('equipe_visiteurs_id')->unsigned();

            $table->foreign('equipe_locaux_id')->references('id')->on('equipes')->onDelete('cascade');
            $table->foreign('equipe_visiteurs_id')->references('id')->on('equipes')->onDelete('cascade');


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
        Schema::dropIfExists('matches');
    }
}
