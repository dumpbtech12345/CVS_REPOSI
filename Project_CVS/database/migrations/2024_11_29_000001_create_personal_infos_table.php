<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('linkedin_url')->nullable();
            $table->string('address');
            $table->string('Height');
            $table->string('weight');
            $table->string('Marital_Status');
            $table->string('image')->nullable();
            $table->string('Objective')->nullable();
            $table->string('Facebook')->nullable();
            $table->date('BirthDate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_infos');
    }
}
