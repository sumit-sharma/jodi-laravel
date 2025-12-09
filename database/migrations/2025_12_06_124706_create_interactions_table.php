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
        Schema::create('interaction', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0);
            $table->date('dated');
            $table->time('time');
            $table->integer('empid');
            $table->integer('calltype')->default(0);
            $table->integer('callstatus')->default(0);
            $table->text('description');
            $table->date('futuredate')->nullable();
            $table->integer('status')->default(0);

            $table->index('status');
            $table->index('futuredate');
            $table->index('callstatus');
            $table->index('calltype');
            $table->index('empid');
            $table->index('dated');
            $table->index('rno');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interaction');
    }
};
