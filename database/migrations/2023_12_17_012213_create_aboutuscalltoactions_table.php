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
            $table->string('title', 255)->nullable();
            $table->string('description', 2000)->nullable();
            $table->string('section')->default('main');
            $table->string('lefttitle', 2000)->nullable();
            $table->string('leftdescription', 2000)->nullable();
            $table->string('middletitle', 2000)->nullable();
            $table->string('middledescription', 2000)->nullable();
            $table->string('righttitle', 2000)->nullable();
            $table->string('rightdescription', 2000)->nullable();
            $table->string('video')->nullable(); // Add a field for video path or URL
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
