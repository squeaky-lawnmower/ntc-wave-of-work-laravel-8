<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ats_user', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 200);
            $table->string('middlename', 200)->nullable();
            $table->string('lastname', 200);
            $table->date('birthdate')->nullable();
            $table->string('company')->nullable();
            $table->enum('account_type', ['employer', 'jobseeker']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('resume_filename')->nullable();
            $table->rememberToken('remember_token');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::create('tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('ats_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ats_users');
        Schema::dropIfExists('ats_password_reset_tokens');
        Schema::dropIfExists('ats_sessions');
    }
};
