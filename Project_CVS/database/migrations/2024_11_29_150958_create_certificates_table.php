<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('personal_info_id')->constrained('personal_infos')->onDelete('cascade');
            $table->string('name');
            $table->string('issuing_organization');
            $table->date('issue_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
