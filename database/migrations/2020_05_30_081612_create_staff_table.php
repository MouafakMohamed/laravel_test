<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('pre');
            $table->string('image');
            $table->string('cin');
            $table->string('tele');
            $table->string('sex');
            $table->string('date');
            $table->string('adress')->nullable();
            $table->string('fonction');
            $table->string('post');
            $table->string('type');
            $table->string('date1');
            $table->string('date2')->nullable();
            $table->string('salaire');
            $table->string('compet')->nullable();
            $table->string('rib')->nullable();
            $table->string('banque')->nullable();
            $table->string('cnss')->nullable();
            $table->string('status')->nullable();
            $table->string('class')->nullable();
            $table->string('transport')->nullable();
            $table->string('emploi')->nullable();
            $table->string('basedonne')->nullable();
            $table->string('GRH')->nullable();
            $table->string('biblio')->nullable();
            $table->string('cours')->nullable();
            $table->string('livre')->nullable();
            $table->string('contacts')->nullable();
            $table->string('clubs')->nullable();
            $table->string('stock')->nullable();
            $table->string('email')->unique();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->string('linked')->nullable();
            $table->string('block')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('staff');
    }
}
