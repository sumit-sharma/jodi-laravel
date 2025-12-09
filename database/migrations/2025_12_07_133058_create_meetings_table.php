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
        Schema::create('meeting', function (Blueprint $table) {
            $table->id();

            $table->integer('rno');                 // INT NOT NULL
            $table->integer('proposal');            // INT NOT NULL
            $table->date('dated');                  // DATE NOT NULL
            $table->time('time');                   // TIME NOT NULL
            $table->string('place', 50);            // VARCHAR(50) NOT NULL
            $table->integer('mtg_by1');             // INT NOT NULL
            $table->integer('mtg_by2');             // INT NOT NULL
            $table->string('meeting_type', 50);     // VARCHAR(50) NOT NULL
            $table->string('remarks', 200);         // VARCHAR(200) NOT NULL
            $table->integer('att_by1');             // INT NOT NULL
            $table->integer('att_by2');             // INT NOT NULL

            // Indexes (non-unique)
            $table->index('rno');
            $table->index('proposal');
            $table->index('mtg_by1');
            $table->index('mtg_by2');
            $table->index('att_by1');
            $table->index('att_by2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting');
    }
};
