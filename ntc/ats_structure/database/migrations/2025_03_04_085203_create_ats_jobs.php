<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtsJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ats_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('ats_user');
            $table->string('job_code');
            $table->string('job_title');
            $table->longText('job_description');
            $table->longText('job_tasks');
            $table->enum('status', ['draft', 'open', 'close']);
            $table->enum('contract_type', ['full_time', 'part_time', 'contract_based']);
            $table->date('hiring_start_date');
            $table->date('hiring_end_date');
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
        Schema::dropIfExists('ats_jobs');
    }
}
