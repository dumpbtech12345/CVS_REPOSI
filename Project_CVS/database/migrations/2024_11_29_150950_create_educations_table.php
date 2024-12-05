<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('personal_info_id')->constrained('personal_infos')->onDelete('cascade');
            $table->string('degree');
            $table->string('school_name');
            $table->string('field_of_study')->nullable();
            $table->date('start_date');
            $table->date('graduation_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educations');
    }
}