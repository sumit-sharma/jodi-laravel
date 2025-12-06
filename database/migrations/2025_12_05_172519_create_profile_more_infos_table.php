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
        Schema::create('profile_moreinfo', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->unique();
            $table->date('dated');
            $table->time('time');
            $table->integer('empid');
            $table->integer('metwith')->default(0);
            $table->text('member')->nullable();
            $table->text('profession')->nullable();
            $table->text('family')->nullable();
            $table->string('prop1', 20)->nullable();
            $table->string('prop2', 20)->nullable();
            $table->string('prop3', 20)->nullable();
            $table->text('properties')->nullable();
            $table->text('residence')->nullable();
            $table->text('business')->nullable();
            $table->text('income')->nullable();
            $table->text('rentedincome')->nullable();
            $table->text('turnover')->nullable();
            $table->text('vehicle')->nullable();
            $table->text('roka')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_moreinfo');
    }
};
