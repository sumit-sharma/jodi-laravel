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
        Schema::create('profile_bs', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->default(0)->index();
            $table->string('bsname', 500)->nullable();
            $table->string('bs', 20);
            $table->integer('bsage')->default(0)->index();
            $table->string('bsmarriage', 10)->nullable()->index();
            $table->text('bsdetails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_bs');
    }
};
