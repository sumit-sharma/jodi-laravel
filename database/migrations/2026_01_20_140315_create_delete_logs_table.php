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
        Schema::create('delete_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');
            $table->string('refname');
            $table->integer('empid');
            $table->date('dated');
            $table->time('time');

            $table->index('rno');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delete_logs');
    }
};
