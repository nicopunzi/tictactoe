<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->string('a1')->nullable();
            $table->string('a2')->nullable();
            $table->string('a3')->nullable();
            $table->string('b1')->nullable();
            $table->string('b2')->nullable();
            $table->string('b3')->nullable();
            $table->string('c1')->nullable();
            $table->string('c2')->nullable();
            $table->string('c3')->nullable();
            $table->string('player1');
            $table->string('player2');
            $table->string('name1');
            $table->string('name2');
            $table->string('game_status')->nullable();
            $table->string('winner')->nullable();

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
}