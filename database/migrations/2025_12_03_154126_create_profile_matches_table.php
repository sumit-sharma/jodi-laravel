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
        Schema::create('profile_matches', function (Blueprint $table) {
            $table->id();

            $table->integer('rno')->unique();
            $table->integer('agefrom')->default(0)->index();
            $table->integer('ageupto')->default(0)->index();
            $table->integer('hghtfrom')->nullable()->index();
            $table->integer('hghtto')->nullable()->index();

            $table->string('religion', 10)->nullable()->index();
            $table->string('caste', 500)->nullable()->index();
            $table->string('education', 50)->nullable()->index();
            $table->string('edupref', 500)->nullable()->index();
            $table->string('eatingpref', 20)->nullable()->index();
            $table->string('astropref', 20)->nullable()->index();
            $table->string('rspref', 20)->nullable()->index();
            $table->string('mspref', 20)->nullable()->index();
            $table->string('childpref', 10)->nullable()->index();
            $table->string('occupref', 500)->nullable()->index();
            $table->string('incomepref', 100)->nullable()->index();
            $table->string('zonepref', 100)->nullable()->index();
            $table->string('mr', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_matches');
    }
};
