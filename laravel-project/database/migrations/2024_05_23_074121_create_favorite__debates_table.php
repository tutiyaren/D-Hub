<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteDebatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite__debates', function (Blueprint $table) {
            $table->id();
            $table->integer('anonymity_id')->nullable(false)->onDelete('cascade');;
            $table->integer('debate_id')->nullable(false)->onDelete('cascade');;
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
        Schema::dropIfExists('favorite__debates');
    }
}
