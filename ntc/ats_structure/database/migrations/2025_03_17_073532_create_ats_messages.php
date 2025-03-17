<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtsMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ats_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_sender_id');
            $table->foreign('original_sender_id')->references('id')->on('ats_user');
            $table->unsignedBigInteger('original_receiver_id');
            $table->foreign('original_receiver_id')->references('id')->on('ats_user');
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
        Schema::dropIfExists('ats_messages');
    }
}
