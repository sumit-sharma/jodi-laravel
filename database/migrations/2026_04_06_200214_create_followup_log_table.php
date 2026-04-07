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
        Schema::create('followup_log', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');
            $table->integer('d_to');
            $table->integer('d_by');
            $table->date('dated');
            $table->time('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followup_log');
    }
};
