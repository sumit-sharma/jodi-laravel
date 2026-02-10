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
        Schema::create('printprofile', function (Blueprint $table) {
            $table->id();

            $table->integer('rno');
            $table->date('dated');
            $table->time('time');
            $table->integer('empid');

            $table->integer('wc')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();

            // Indexes
            $table->index('status');
            $table->index('wc');
            $table->index('rno');
            $table->index('empid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printprofile');
    }
};
