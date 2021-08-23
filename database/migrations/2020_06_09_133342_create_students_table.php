<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('id1');
            $table->string('nom');
            $table->string('pre');
            $table->string('nom1')->nullable();
            $table->string('pre1')->nullable();
            $table->string('sex');
            $table->string('incsription_num')->nullable();
            $table->string('date')->nullable();
            $table->text('adress')->nullable();
            $table->string('image_qr')->nullable();
            $table->string('image');
            $table->string('categorie');
            $table->string('cycle');
            $table->string('payement');
            $table->string('class')->nullable();
            $table->string('class_num')->nullable();
            $table->string('date_d')->nullable();
            $table->string('transport')->nullable();
            $table->string('trajet')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->string('youtube')->nullable();
            $table->text('fich')->nullable();
            $table->string('med_nom')->nullable();
            $table->string('med_tel')->nullable();
            $table->string('med_adress')->nullable();
            $table->string('anne')->nullable();
            $table->string('passe')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood')->nullable();
            $table->string('user');
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
}
