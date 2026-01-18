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
        Schema::create('daily_moment', function (Blueprint $table) {
            $table->id();
            $table->date('dated');
            $table->time('timefrom');
            $table->time('timeto');
            $table->integer('empid');
            $table->text('moment');

            $table->index(['dated', 'empid'], 'dated_empid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_moment');
    }
};
