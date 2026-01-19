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
        Schema::create('convert_log', function (Blueprint $table) {
            $table->id();

            $table->integer('old_rno')->default(0);
            $table->integer('new_rno')->default(0);
            $table->integer('empid')->default(0);

            $table->enum('status', ['SUCCESS', 'FAILED'])->nullable();
            $table->string('message', 255)->nullable();

            $table->date('dated');
            $table->time('time');

            // Indexes
            $table->index('old_rno');
            $table->index('new_rno');
            $table->index('empid');
            $table->index('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convert_log');
    }
};
