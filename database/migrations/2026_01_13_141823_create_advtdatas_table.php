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
        Schema::create('advtdata', function (Blueprint $table) {
            $table->id();

            $table->integer('rno');                 // int NOT NULL
            $table->string('matchfor', 1)->nullable();
            $table->integer('age')->nullable();
            $table->integer('hght')->nullable();
            $table->string('community', 50)->nullable();
            $table->string('education', 500)->nullable();
            $table->string('occupation', 500)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('remarks', 500)->nullable();
            $table->integer('assignto')->nullable();
            $table->integer('empid')->nullable();
            $table->date('edate')->nullable();

            // Indexes
            $table->index('rno');
            $table->index('mobile');
            $table->index('email');
            $table->index('assignto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advtdata');
    }
};
