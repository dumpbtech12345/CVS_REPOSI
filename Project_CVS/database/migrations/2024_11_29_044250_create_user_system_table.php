<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_system', function (Blueprint $table) {
            $table->bigIncrements('id'); // BIGINT UNSIGNED Auto-increment primary key
            $table->string('firstname'); // First name
            $table->string('lastname'); // Last name
            $table->string('username')->unique(); // Unique username
            $table->string('password'); // Password
            $table->string('role'); // role
            $table->string('email')->unique(); // Unique email
            $table->string('number', 15); // Phone number (max length 15)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_system');
    }
}

