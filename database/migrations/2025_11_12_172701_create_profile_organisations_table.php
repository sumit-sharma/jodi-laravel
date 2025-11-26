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
        Schema::create('profile_organisation', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0)->index();
            $table->string('orgname', 750)->nullable();
            $table->string('orgdept', 750)->nullable();
            $table->string('orgyear', 750)->nullable();

            $table->fullText('orgname');
            $table->fullText('orgdept');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_organisation');
    }
};
