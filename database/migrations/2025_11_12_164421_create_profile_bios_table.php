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
        Schema::create('profile_bio', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');
            $table->string('gender', 1)->nullable();
            $table->string('refname', 100)->nullable()->fulltext('rnamefulltext');
            $table->date('dob')->nullable();
            $table->string('tob', 5)->nullable();
            $table->integer('age')->nullable()->index();
            $table->string('pob')->nullable();
            $table->integer('religion')->nullable()->index();
            $table->integer('caste')->nullable()->index();
            $table->string('subcaste', 100)->nullable();
            $table->string('gotra', 100)->nullable();
            $table->integer('hght')->nullable()->index();
            $table->string('hghtft', 20)->nullable();
            $table->integer('wtkg')->nullable();
            $table->integer('complexion')->nullable();
            $table->string('dd', 500)->nullable()->index();
            $table->string('bg', 15)->nullable();
            $table->integer('astrostatus')->nullable()->index();
            $table->integer('drinkinghabit')->nullable()->index();
            $table->integer('smokinghabit')->nullable()->index();
            $table->integer('eatinghabit')->nullable();
            $table->string('spects')->nullable();
            $table->integer('education')->nullable()->index();
            $table->integer('occupation')->nullable()->index();
            $table->integer('income')->nullable()->index();
            $table->integer('rs')->nullable()->index();
            $table->integer('ms')->nullable()->index();
            $table->string('childstatus', 300)->nullable()->index();
            $table->string('dtype', 2)->nullable()->index();
            $table->integer('payment')->nullable()->index();
            $table->dateTime('profiledate', 2)->nullable()->index();
            $table->integer('empid')->nullable();
            $table->integer('rfno')->nullable()->index();
            $table->tinyInteger('brand')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_bio');
    }
};
