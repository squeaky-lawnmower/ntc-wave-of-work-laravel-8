<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtsJobApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ats_job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('ats_user');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('ats_jobs');
            $table->enum('status', ['accepted', 'declined', 'pending', 'withdrawn']);
            $table->date('application_start_date');
            $table->date('application_end_date')->nullable();
            $table->unsignedBigInteger('hired_by');
            $table->foreign('hired_by')->references('id')->on('ats_user');
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
        Schema::dropIfExists('ats_job_applications');
    }
}
