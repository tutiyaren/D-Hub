<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->integer('anonymity_id')->nullable(false)->onDelete('cascade');
            $table->integer('debate_id')->nullable(false)->onDelete('cascade');
            $table->enum('vote_type', ['agree', 'disagree'])->nullable(false);
            $table->timestamps();

            $table->unique(['anonymity_id', 'debate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
