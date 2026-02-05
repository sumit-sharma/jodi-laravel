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
        Schema::create('followup_autolog', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');
            $table->integer('empid');
            $table->date('dated');
            $table->timestamps();

            $table->index('rno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followup_autolog');
    }
};
