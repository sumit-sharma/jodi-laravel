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
        Schema::create('done_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('br_rno');
            $table->string('br_name', 50);
            $table->string('br_business', 150);
            $table->string('br_location', 100);
            $table->integer('gr_rno');
            $table->string('gr_name', 50);
            $table->string('gr_business', 150)->nullable();
            $table->string('gr_location', 100)->nullable();
            $table->integer('fix_month');
            $table->integer('fix_year');
            $table->date('rdate')->nullable();
            $table->date('wdate')->nullable();
            $table->integer('done_by1')->nullable();
            $table->integer('done_by2')->nullable();
            $table->integer('empid');

            $table->timestamps();

            // Indexes
            $table->index('br_rno');
            $table->index('gr_rno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('done_lists');
    }
};
