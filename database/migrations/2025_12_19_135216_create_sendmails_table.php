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
        Schema::create('sendmail', function (Blueprint $table) {
            $table->id();

            $table->date('dated')->nullable();
            $table->time('time')->nullable();
            $table->integer('rno')->default(0);
            $table->integer('proposal')->default(0);
            $table->text('photos')->nullable();      // latin1_swedish_ci in MySQL
            $table->string('matter', 1000)->nullable();     // latin1_swedish_ci in MySQL
            $table->integer('wc')->nullable();
            $table->integer('pdftype')->default(1);
            $table->integer('empid')->default(0);
            $table->integer('status')->default(0);
            $table->string('addl_st', 50)->nullable();      // latin1_swedish_ci in MySQL
            $table->string('feedback', 200)->nullable();    // latin1_swedish_ci in MySQL
            $table->string('feedback1', 200)->nullable();
            $table->integer('fdb_by')->nullable();
            $table->dateTime('fdb_date')->nullable();

            $table->index('status');
            $table->index('rno');
            $table->index('proposal');
            $table->index('empid');
            $table->index('dated');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sendmail');
    }
};
