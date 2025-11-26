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
        Schema::create('profile_personal', function (Blueprint $table) {
            $table->id();
            $table->integer('rno');
            $table->string('visa', 150)->nullable();
            $table->string('rcity', 50)->nullable();
            $table->string('rcountry', 50)->nullable();
            $table->string('marriageinfo', 500)->nullable();
            $table->string('child', 50)->nullable();
            $table->string('childdetails', 200)->nullable();
            $table->text('occdetails')->nullable()->fulltext();
            $table->string('familyvalue', 900)->nullable();
            $table->string('familystatus', 900)->nullable();
            $table->string('fathersname', 100)->nullable()->index();
            $table->string('mothersname', 100)->nullable()->index();
            $table->text('fatherdetails')->nullable()->fulltext('fatherdetails');
            $table->string('motherdetails', 1500)->nullable();
            $table->string('fatherocc', 500)->nullable();
            $table->string('motherocc', 500)->nullable();
            $table->integer('familyincome')->nullable();
            $table->string('familyincomem', 50)->nullable();
            $table->string('typeoffamily', 50)->nullable();
            $table->string('familynative', 100)->nullable();
            $table->text('hobbies')->nullable();
            $table->text('characteristics')->nullable();
            $table->integer('eyecolor')->nullable();
            $table->integer('haircolor')->nullable();
            $table->string('salary', 100)->nullable();
            $table->string('budget', 150)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->text('familyhistory')->nullable();
            $table->string('contactperson', 100)->nullable()->index();
            $table->string('contactaddress', 800)->nullable()->fulltext('contactaddress');
            $table->string('contactcity', 100)->nullable()->fulltext('contactcity');
            $table->string('contactstate', 100)->nullable()->fulltext('contactstate');
            $table->string('contactpincode', 50)->nullable();
            $table->string('contactcountry', 100)->nullable();
            $table->string('contactphone', 300)->nullable()->fulltext('contactphone');
            $table->string('contactemail', 200)->nullable()->fulltext('contactemail');
            $table->string('contactrelation', 100)->nullable()->fulltext();
            $table->text('personaldetails')->nullable();
            $table->integer('contactzone')->nullable()->index();
            $table->string('arealocation', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_personal');
    }
};
