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
        Schema::create('editdatalog', function (Blueprint $table) {
            $table->id();
            $table->date('dated');
            $table->time('time');
            $table->integer('rno');
            $table->integer('empid');
            $table->string('field', 75)->nullable();
            $table->string('olddata', 500)->nullable();
            $table->string('newdata', 500)->nullable();
            $table->timestamps();
            $table->index('rno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editdatalog');
    }
};
