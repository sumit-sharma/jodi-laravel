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
        Schema::create('viewprofile', function (Blueprint $table) {
            $table->id();
            $table->integer('rno')->index();
            $table->string('g', 1)->default('');
            $table->string('refname', 100)->default('')->index();
            $table->integer('y')->nullable();
            $table->integer('m')->nullable();
            $table->integer('rl')->nullable();
            $table->string('cst', 100)->default('');
            $table->integer('hg')->nullable();
            $table->string('hghtft', 20)->nullable();
            $table->string('wt', 3)->default('');
            $table->string('eh', 2)->default('');
            $table->string('ast', 2)->default('');
            $table->string('ed', 2)->default('');
            $table->string('oc', 4)->default('');
            $table->integer('pi')->nullable();
            $table->string('rs', 10)->default('');
            $table->string('ms', 10)->default('');
            $table->string('ch', 50)->default('');
            $table->integer('fi')->nullable();
            $table->integer('tc')->nullable()->index();
            $table->integer('mc')->nullable();
            $table->integer('rm')->nullable()->index();
            $table->integer('p_sent')->nullable()->index();
            $table->date('last_mail')->nullable();
            $table->date('last_call')->nullable();
            $table->date('last_mtng')->nullable();
            $table->string('dtype', 1)->default('')->index();
            $table->string('status', 1)->default('')->index();
            $table->string('ost', 3)->default('')->index();
            $table->integer('vc')->default(0)->index();
            $table->integer('op')->default(0)->index();
            $table->string('st', 2)->default('')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewprofile');
    }
};
