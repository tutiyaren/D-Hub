<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_tels', function (Blueprint $table) {
            $table->integer('contact_id')->nullable(false)->onDelete('cascade');
            $table->string('tel', 15)->nullable(false);
            $table->timestamps();

            $table->primary(['contact_id', 'tel']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_tels');
    }
}
