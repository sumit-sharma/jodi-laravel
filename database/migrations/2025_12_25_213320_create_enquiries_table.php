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
        Schema::create('enquiry', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');                 // int NOT NULL
            $table->date('dated');                  // date NOT NULL
            $table->time('time');                   // time NOT NULL
            $table->integer('empid');               // int NOT NULL
            $table->string('enqpur');          // varchar(100) NOT NULL
            $table->text('remarks')->nullable();        // varchar(300) NULL
            $table->text('furtheraction')->nullable();  // varchar(300) NULL
            $table->integer('slfor')->nullable();              // int NULL
            $table->integer('updatedby')->nullable();          // int NULL
            $table->dateTime('updatedatetime')->nullable();    // datetime NULL
            $table->integer('status')->nullable();             // int NULL
            $table->timestamps();

            $table->index('rno');
            $table->index('status');
            $table->index('slfor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry');
    }
};
