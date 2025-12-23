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
        Schema::create('classified', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->nullable();
            $table->integer('empid')->nullable();
            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('status')->nullable();

            $table->index('rno');
            $table->index('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classified');
    }
};
