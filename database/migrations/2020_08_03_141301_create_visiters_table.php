<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiters', function (Blueprint $table) {
            $table->id();
            $table->string('objectif');
            $table->string('nom');
            $table->string('tele');
            $table->string('cin');
            $table->string('time1');
            $table->string('time2');
            $table->text('note')->nullable();
            $table->string('date');
            $table->text('image');
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
        Schema::dropIfExists('visiters');
    }
}
