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
        Schema::create('link_tl_tc', function (Blueprint $table) {
            $table->bigIncrements('srno');
            $table->string('tl', 50);
            $table->string('tc', 50);

            $table->timestamps();
            // Indexes (important for joins)
            $table->index('tl');
            $table->index('tc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_tl_tc');
    }
};
