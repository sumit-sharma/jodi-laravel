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
        Schema::create('refer', function (Blueprint $table) {
            $table->id();

            $table->integer('refno');
            $table->string('referencename', 100)->nullable();
            $table->string('candidatename', 100)->nullable();
            $table->string('searchingfor', 100)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('contactno', 100)->nullable();
            $table->string('emailid', 100)->nullable();
            $table->string('source', 100)->nullable();
            $table->string('givenby', 100)->nullable();
            $table->string('remarks', 250)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('assignto', 50)->nullable();
            $table->dateTime('dated')->useCurrent()->useCurrentOnUpdate();                     // CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            $table->integer('empid');
            $table->timestamps();

            // keys
            $table->index('assignto');
            $table->index('empid');
            $table->index('referencename');
            $table->index('candidatename');
            $table->index('address');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refer');
    }
};
