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
        Schema::create('dailyfullreport', function (Blueprint $table) {
            $table->id();
            $table->integer('userid')->nullable()->index();
            $table->integer('empid')->nullable()->index();

            $table->string('empname', 50)->nullable();

            $table->integer('nde')->default(0);
            $table->integer('edata')->default(0);
            $table->integer('interaction')->default(0);
            $table->integer('sl')->default(0);
            $table->integer('ms')->default(0);
            $table->integer('fu')->default(0);
            $table->integer('ma')->default(0);
            $table->integer('mat')->default(0);
            $table->integer('mf')->default(0);
            $table->integer('fc')->default(0);
            $table->integer('nr')->default(0);
            $table->integer('flc')->default(0);
            $table->integer('refa')->default(0);
            $table->integer('af')->default(0);
            $table->integer('aa')->default(0);
            $table->integer('nor')->default(0);
            $table->integer('dm')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailyfullreport');
    }
};
