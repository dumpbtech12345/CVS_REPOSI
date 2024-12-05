<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantCertificateTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_certificate', function (Blueprint $table) {
            $table->id(); // bigint unsigned
            $table->foreignId('applicant_id') // Creates a bigint unsigned column
                  ->constrained('personal_infos') // Correct table name here
                  ->onDelete('cascade'); // References 'id' column in 'personal_infos'
            $table->string('certificate_name');
            $table->string('issuing_organization');
            $table->date('issue_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_certificate');
    }
}