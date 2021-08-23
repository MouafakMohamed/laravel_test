<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prixes', function (Blueprint $table) {
            $table->id();
            $table->string('student');
            $table->integer('09')->nullable();
            $table->integer('10')->nullable();
            $table->integer('11')->nullable();
            $table->integer('12')->nullable();
            $table->integer('01')->nullable();
            $table->integer('02')->nullable();
            $table->integer('03')->nullable();
            $table->integer('04')->nullable();
            $table->integer('05')->nullable();
            $table->integer('06')->nullable();
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
        Schema::dropIfExists('prixes');
    }
}
