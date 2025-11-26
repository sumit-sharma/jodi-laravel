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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('emp_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('loginname')->nullable();
            $table->string('lastlogindate')->nullable();
            $table->string('joiningdate')->nullable();
            $table->string('leavingdate')->nullable();
            $table->string('dob')->nullable();
            $table->string('anniversary')->nullable();
            $table->string('gender')->nullable();
            $table->time('intime')->nullable();
            $table->time('outtime')->nullable();
            $table->string('offday')->nullable();
            $table->string('department')->nullable();
            $table->text('signature')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('emp_details');
    }
};
