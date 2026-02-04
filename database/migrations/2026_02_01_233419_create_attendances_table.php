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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('empid')->nullable();
            $table->date('dated')->nullable();
            $table->time('intime')->nullable();
            $table->time('outtime')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('ent_by')->nullable();
            $table->timestamps();

            $table->index(['empid', 'dated'], 'empid_dated');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
