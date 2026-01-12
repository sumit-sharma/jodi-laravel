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
        Schema::create('form_transfer', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->index();
            $table->integer('assign_from')->nullable()->index();
            $table->date('assign_date')->nullable();
            $table->time('assign_time')->nullable();
            $table->integer('assign_to')->nullable()->index();
            $table->date('received_date')->nullable();
            $table->time('received_time')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_transfer');
    }
};
