<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubStudentsTable extends Migration
{
   
    public function up()
    {
        Schema::create('club__students', function (Blueprint $table) {
            $table->id();
            $table->string('club');
            $table->string('student');
            $table->string('date');
            $table->string('validate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('club__students');
    }
}
