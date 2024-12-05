<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('personal_info_id')->constrained('personal_infos')->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('responsibilities');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_experiences');
    }
}