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
        Schema::create('client_sl', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0);        // int DEFAULT '0' 
            $table->integer('proposal')->default(0);   // int DEFAULT '0' 
            $table->date('dated')->nullable();         // date DEFAULT NULL 
            $table->time('time')->nullable();          // time DEFAULT NULL 
            $table->string('status', 10)->default('0'); // varchar(10) DEFAULT '0' 
            $table->string('remarks', 50)->nullable(); // varchar(50) DEFAULT NULL 
            $table->integer('slby')->nullable();       // int DEFAULT NULL 
            $table->integer('doneby')->nullable();     // int DEFAULT NULL 
            $table->date('donedate')->nullable();      // date DEFAULT NULL 
            // Indexes
            $table->index('rno');                      // KEY `rno` (`rno`) 
            $table->index('proposal');                 // KEY `proposal` (`proposal`) 
            $table->index('status');                   // KEY `status` (`status`) 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_sl');
    }
};
