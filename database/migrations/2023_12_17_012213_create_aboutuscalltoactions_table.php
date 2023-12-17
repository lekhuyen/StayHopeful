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
        Schema::create('aboutuscalltoactions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('section')->default('main');
            $table->string('lefttitle')->nullable();
            $table->string('leftdescription')->nullable();
            $table->string('middletitle')->nullable();
            $table->string('middledescription')->nullable();
            $table->string('righttitle')->nullable();
            $table->string('rightdescription')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuscalltoactions');
    }
};
