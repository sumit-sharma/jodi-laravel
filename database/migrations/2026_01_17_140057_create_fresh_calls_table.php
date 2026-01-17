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
        Schema::create('freshcalls', function (Blueprint $table) {
            $table->id();

            $table->date('dated');
            $table->integer('empid');
            $table->string('callsource');
            $table->integer('noofcalls');
            $table->integer('callsconnected');
            $table->integer('followupcalls');

            $table->index('empid');
            $table->index('dated');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freshcalls');
    }
};
