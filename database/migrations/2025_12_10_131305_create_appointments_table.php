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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->integer('empid');
            $table->integer('rno')->nullable()->default(0);
            $table->string('refname', 100)->nullable();
            $table->string('contactaddress', 250)->nullable();
            $table->string('contactphone', 100)->nullable();
            $table->string('apttype', 100);
            $table->date('aptdate');
            $table->time('apttime');
            $table->string('remarks', 200)->nullable();
            $table->integer('aptstatus')->nullable();
            $table->date('update_date')->nullable();
            $table->string('aptremarks', 250)->nullable();
            $table->integer('att_by1')->nullable();
            $table->integer('att_by2')->nullable();

            // Indexes
            $table->index('empid');
            $table->index('aptstatus');
            $table->index('aptdate');
            $table->index('att_by1');
            $table->index('att_by2');
            $table->index('update_date');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
