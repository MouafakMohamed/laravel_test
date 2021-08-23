<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraiInscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frai_inscs', function (Blueprint $table) {
            $table->id();
            $table->integer('student');
            $table->integer('frais_insc');
            $table->integer('Transport');
            $table->integer('Cantine');
            $table->integer('Guarde');
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
        Schema::dropIfExists('frai_inscs');
    }
}
