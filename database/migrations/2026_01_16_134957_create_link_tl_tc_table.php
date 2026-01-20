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
            $table->id();

            $table->integer('tl')->default(0);
            $table->integer('tc')->default(0);

            $table->index('tl');
            $table->index('tc', 'rm');


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
