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
        Schema::create('fix_member', function (Blueprint $table) {
            $table->id();

            $table->integer('rno')->nullable();
            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('fix_by')->nullable();
            $table->string('fixed_through', 50)->nullable();
            $table->string('remarks', 200)->nullable();
            $table->integer('status')->nullable();
            $table->integer('update_by')->nullable();
            $table->date('update_date')->nullable();
            $table->time('update_time')->nullable();

            // Indexes
            $table->index('rno');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fix_member');
    }
};
