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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();

            $table->integer('rno')->default(0)->index();
            $table->integer('proposal')->default(0)->index();
            $table->integer('fstatus')->default(0)->index();

            $table->text('feedback');
            $table->date('fdate');
            $table->time('time');

            $table->integer('fby')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
