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
        Schema::create('org_log', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0);
            $table->string('orgname', 200)->nullable();
            $table->string('orgdept', 200)->nullable();
            $table->string('orgyear', 100)->nullable();
            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('empid')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('rno');
            $table->fullText('orgname');
            $table->fullText('orgdept');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_log');
    }
};
