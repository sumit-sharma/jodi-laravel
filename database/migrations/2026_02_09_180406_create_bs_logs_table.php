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
        Schema::create('bs_log', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0);
            $table->string('bsname', 200)->nullable();
            $table->string('bs', 10)->nullable();
            $table->integer('bsage')->default(0);
            $table->string('bsmarriage', 10)->nullable();
            $table->string('bsdetails', 500)->nullable();
            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('empid')->nullable();
            $table->timestamps();


            // Indexes
            $table->index('rno');
            $table->index('bsage');
            $table->index('bsmarriage');
            $table->index('bs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bs_log');
    }
};
