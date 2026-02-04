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
        Schema::create('edu_log', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->nullable();
            $table->string('educourse', 250)->nullable();
            $table->string('eduinst', 250)->nullable();
            $table->string('eduyear', 200)->nullable();
            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('empid')->nullable();
            $table->timestamps();
            $table->index('rno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edu_log');
    }
};
