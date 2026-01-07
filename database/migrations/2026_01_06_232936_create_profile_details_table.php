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
        Schema::create('profile_details', function (Blueprint $table) {
            $table->id();

            $table->integer('rno')->unique();

            $table->string('package')->nullable();
            $table->string('service')->nullable();

            $table->integer('tc')->default(0);
            $table->integer('mc')->default(0);
            $table->integer('rm')->default(0);

            $table->string('otherdetails')->nullable();
            $table->string('reference')->nullable();

            $table->string('duration')->nullable();

            // Indexes
            $table->index('package');
            $table->index('service');
            $table->index('tc', 'empmain');
            $table->index('mc', 'empcc');
            $table->index('rm');
            $table->index('reference');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_details');
    }
};
