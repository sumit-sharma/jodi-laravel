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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->date('dated')->nullable();      // DATE DEFAULT NULL
            $table->time('time')->nullable();       // TIME DEFAULT NULL
            $table->integer('msgfrom')->nullable(); // INT DEFAULT NULL

            // Fixing the typo: `interger` -> `integer`
            $table->integer('msgto')->nullable();   // INT DEFAULT NULL

            $table->text('message')->nullable();    // TEXT DEFAULT NULL
            $table->string('received', 225)->nullable(); // VARCHAR(225) DEFAULT NULL

            // Indexes
            $table->index('msgto');
            $table->index('received');
            $table->index('msgfrom');
            $table->index('dated');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
