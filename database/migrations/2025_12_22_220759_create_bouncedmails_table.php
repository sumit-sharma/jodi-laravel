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
        Schema::create('bouncedmail', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->nullable()->default(null);
            $table->string('email', 364)->nullable()->default(null);

            $table->index('rno');
            $table->index('email');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bouncedmail');
    }
};
